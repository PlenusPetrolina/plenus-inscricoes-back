<?php

namespace App\Http\Controllers;

use App\Repositories\AlunoRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AlunoController extends Controller
{
    public function __construct(private AlunoRepository $repo)
    {
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json(
            $this->repo->paginate(10),
            200
        );
    }

    public function import(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:xlsx,xls'],
        ]);

        $file = $request->file('file');

        $skipped = 0;

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getRealPath());

            $sheet = $spreadsheet->getSheetByName('Dados exportados')
                ?? $spreadsheet->getSheet(0);

            $highestRow = $sheet->getHighestRow();
            $highestCol = $sheet->getHighestColumn();

            $headerRow = $sheet->rangeToArray("A1:{$highestCol}1", null, true, false)[0];

            $map = [];
            foreach ($headerRow as $idx => $title) {
                $t = trim((string) $title);
                if ($t !== '')
                    $map[$t] = $idx;
            }

            $colMatricula = $map['Matrícula'] ?? null;
            $colNomeAluno = $map['Nome do aluno'] ?? null;
            $colNomeResp = $map['Nome do responsável financeiro'] ?? null;
            $colDocResp = $map['CPF/CNPJ do responsável financeiro'] ?? null;

            if ($colMatricula === null || $colNomeAluno === null) {
                return response()->json([
                    'message' => 'Cabeçalho inválido. Preciso das colunas: "Matrícula" e "Nome do aluno".',
                ], 422);
            }

            // 1) Monta array de alunos (sem bater no banco por linha)
            $rowsToUpsert = [];
            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray("A{$row}:{$highestCol}{$row}", null, true, false)[0];

                $matricula = trim((string) ($rowData[$colMatricula] ?? ''));
                $nomeAluno = trim((string) ($rowData[$colNomeAluno] ?? ''));

                if ($matricula === '' || $nomeAluno === '') {
                    $skipped++;
                    continue;
                }

                $nomeResp = $colNomeResp !== null ? trim((string) ($rowData[$colNomeResp] ?? '')) : null;

                $docResp = $colDocResp !== null ? trim((string) ($rowData[$colDocResp] ?? '')) : null;
                $docResp = $docResp ? preg_replace('/\D+/', '', $docResp) : null;
                $docResp = $docResp ?: null;

                $rowsToUpsert[] = [
                    'matricula' => $matricula,
                    'nome' => $nomeAluno,
                    'nome_responsavel' => $nomeResp ?: null,
                    'cpf_responsavel' => $docResp,
                    'updated_at' => now(),
                    'created_at' => now(),
                ];
            }

            // 2) Conta quantos já existem (1 query só)
            $existingCount = $this->repo->countExistingMatriculas(
                array_values(array_unique(array_column($rowsToUpsert, 'matricula')))
            );

            // 3) Faz UPSERT em lote (rápido)
            $this->repo->upsertByMatricula($rowsToUpsert);

            $total = count($rowsToUpsert);
            $updated = $existingCount;
            $inserted = max(0, $total - $existingCount);

            return response()->json([
                'inserted' => $inserted,
                'updated' => $updated,
                'skipped' => $skipped,
                'total_processed' => $total,
            ], 200);

        } catch (\Throwable $e) {
            \Log::error('Erro ao importar XLSX de alunos', ['error' => $e->getMessage()]);

            return response()->json([
                'message' => 'Falha ao importar a planilha.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
