<?php


namespace App\Repository;

use App\Models\Cost\CostLog as Model;

class CostLogRepository extends AbstractRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
}
