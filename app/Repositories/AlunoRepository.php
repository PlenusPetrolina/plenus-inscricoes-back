<?php

namespace App\Repositories;

use App\Models\Aluno;

class AlunoRepository
{
    protected Aluno $model;

    public function __construct(Aluno $model)
    {
        $this->model = $model;
    }

   public function paginate(int $perPage = 10)
{
     return $this->model
        ->select(['id', 'matricula', 'nome', 'nome_responsavel']) // ajuste
        ->orderBy('id', 'desc')
        ->paginate($perPage);
}


    public function existsByMatricula(string $matricula): bool
    {
        return $this->model->newQuery()
            ->where('matricula', $matricula)
            ->exists();
    }

    public function updateOrCreateByMatricula(string $matricula, array $data): Aluno
    {
        return $this->model->newQuery()->updateOrCreate(
            ['matricula' => $matricula],
            $data
        );
    }

    public function upsertByMatricula(array $rows): void
{
    if (empty($rows)) return;

    // Atualiza esses campos quando a matrícula já existir
    $updateColumns = [
        'nome',
        'nome_responsavel',
        'cpf_responsavel',
        'updated_at',
    ];

    $this->model->newQuery()->upsert(
        $rows,
        ['matricula'],
        $updateColumns
    );
}

public function countExistingMatriculas(array $matriculas): int
{
    if (empty($matriculas)) return 0;

    return $this->model->newQuery()
        ->whereIn('matricula', $matriculas)
        ->count();
}

}
