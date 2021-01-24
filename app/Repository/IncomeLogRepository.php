<?php


namespace App\Repository;

use App\Models\Income\IncomeLog as Model;

class IncomeLogRepository extends AbstractRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
}
