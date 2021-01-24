<?php


namespace App\Repository;

use App\Models\Cost\CostBase as Model;
use Illuminate\Support\Facades\DB;

/**
 * Class CostBaseRepository
 * @package App\Repository
 */
class CostBaseRepository extends AbstractRepository
{
    /**
     * @param $userId
     * @return mixed
     */
    public function getTotalCostsByUserId($userId)
    {
        $result = $this->startCondition()
            ->select(DB::raw('SUM(total) as total'))
            ->where(['user_id' => $userId])
            ->first();

        return $result->total;
    }

    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
