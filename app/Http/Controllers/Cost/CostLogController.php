<?php

namespace App\Http\Controllers\Cost;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakingCostsRequest;
use App\Models\Cost\CostBase;
use App\Models\Cost\CostLog;
use App\Models\Income\IncomeBase;
use App\Repository\CostBaseRepository;
use App\Repository\IncomeBaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CostLogController extends Controller
{

    protected $incomeBaseRepository;
    protected $costBaseRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->incomeBaseRepository = new IncomeBaseRepository();
        $this->costBaseRepository = new CostBaseRepository();
    }

    public function makingCosts (MakingCostsRequest $request, IncomeBase $incomeBase, CostBase $costBase) {
        CostLog::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        $incomeBase->updateTotalById($request->income_base_id, $request->sum);
        $costBase->updateTotalById($request->cost_base_id, $request->sum);

        return redirect()->back();
    }
}
