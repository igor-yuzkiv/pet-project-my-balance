<?php


namespace App\Repository;


use App\Models\Cost\CostLog;
use App\Models\Income\IncomeLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

/**
 * Class TimeLineRepository
 * @package App\Repository
 */
class TimeLineRepository
{
    /**
     * @var IncomeLog
     */
    private $incomeLog;
    /**
     * @var CostLog
     */
    private $costLog;

    /**
     * TimeLineRepository constructor.
     */
    public function __construct()
    {
        $this->incomeLog = new IncomeLog();
        $this->costLog = new CostLog();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getForTimeLine()
    {
        $userId = Auth::id();

        $costLog = $this->getCostLogByUserId($userId);
        $incomeLog = $this->getIncomeLogByUserID($userId);

        $result = collect($costLog)
            ->merge($incomeLog)
            ->sortByDesc(function ($item) {
                return $item->created_at->toDateString();
            })
            ->groupBy(function ($item) {
                return $item->created_at->toDateString();
            });

        return $result;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getCostLogByUserId($userId)
    {

        return $this->costLog
            ->where(['user_id' => $userId])
            ->whereBetween('created_at', $this->getPeriod())
            ->with('costBase')
            ->get();
    }

    /**
     * @return array
     */
    private function getPeriod()
    {
        return [
            Carbon::now()->firstOfMonth()->toDateString(),
            Carbon::now()->lastOfMonth()->toDateString(),
        ];
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getIncomeLogByUserID($userId)
    {
        return $this->incomeLog
            ->where(['user_id' => $userId])
            ->whereBetween('created_at', $this->getPeriod())
            ->with('incomeBase')
            ->get();
    }

}
