<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Models\Income\IncomeLog;
use App\Repository\IncomeBaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IncomeLogController extends Controller
{
    private $incomeBaseRepisitory;

    public function __construct()
    {
        $this->middleware('auth');

        $this->incomeBaseRepisitory = new IncomeBaseRepository();
    }

    public function addIncome(Request $request)
    {

        Validator::make($request->input(),
            [
                'income_base_id' => 'exists:income_base,id',
                'sum' => 'gt:0'
            ]
        )->validate();

        $incomeLog = new IncomeLog();

        $incomeLog->user_id = Auth::id();
        $incomeLog->fill($request->input())->save();

        $incomeBase = $this->incomeBaseRepisitory->getById($request->income_base_id);
        $incomeBase->total += $request->sum;
        $incomeBase->save();

        return redirect()->back();
    }
}
