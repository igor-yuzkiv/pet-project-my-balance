<?php

namespace App\Http\Controllers;

use App\Models\Cost\CostLog;
use App\Repository\TimeLineRepository;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    private $timeLineRepository;

    public function __construct()
    {
        $this->middleware('auth');


        $this->timeLineRepository = new TimeLineRepository();
    }


    public function index() {
        return view('timeline.index', [
            'timeLineData' => $this->timeLineRepository->getForTimeLine(),
        ]);
    }
}
