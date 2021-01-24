<?php

namespace App\Http\Controllers;

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

        dd($this->timeLineRepository->getForTimeLine());

        return view('timeline.index', []);
    }
}
