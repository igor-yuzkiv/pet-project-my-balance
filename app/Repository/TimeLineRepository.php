<?php


namespace App\Repository;


use App\Models\Cost\CostLog;
use App\Models\Income\IncomeLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class TimeLineRepository
{
    private $incomeLog;
    private $costLog;

    public function __construct()
    {
        $this->incomeLog = new IncomeLog();
        $this->costLog = new CostLog();
    }

    public function getForTimeLine() {
        $userId = Auth::id();

        /*$result = [
            'costLog' => $this->getCostLogByUserId($userId),
            'incomeLog' => $this->getIncomeLogByUserID($userId)
        ];*/

        $costLog = $this->getCostLogByUserId($userId);
        $incomeLog = $this->getIncomeLogByUserID($userId);

        $result = collect();

        collect($costLog)->merge($incomeLog)->map(function ($item) use ($result) {
            $result[$item->created_at->toDateString()] = $item;
        });

        return $result;
    }

    public function getCostLogByUserId($userId) {

        return $this->costLog
            ->where(['user_id' => $userId])
            ->whereBetween('created_at', $this->getPeriod())
            ->with('costBase')
            ->get();
    }

    public function getIncomeLogByUserID ($userId) {
        return $this->incomeLog
            ->where(['user_id' => $userId])
            ->whereBetween('created_at', $this->getPeriod())
            ->with('incomeBase')
            ->get();
    }

    private function getPeriod () {
        return [
            Carbon::now()->firstOfMonth()->toDateString(),
            Carbon::now()->lastOfMonth()->toDateString(),
        ];
    }

}
