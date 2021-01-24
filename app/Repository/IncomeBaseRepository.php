<?php


namespace App\Repository;

use App\Models\Income\IncomeBase as Model;
use Illuminate\Support\Facades\DB;

/**
 * Class IncomeBaseRepository
 * @package App\Repository
 */
class IncomeBaseRepository extends AbstractRepository
{
    /**
     * @param $userId
     * @return mixed
     */
    public function getBalanceByUserId($userId)
    {
        $userCurrency = 'UAH';

        $result = $this->startCondition()
            ->select(DB::raw('SUM(total) as total'))
            ->where(["user_id" => $userId])
            ->where(["currency" => $userCurrency])
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
