<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ControllerHelper;
use App\Models\Income\IncomeBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class IncomeBaseController
 * @package App\Http\Controllers\Income
 */
class IncomeBaseController extends Controller
{
    use ControllerHelper;

    /**
     * IncomeBaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('income.base.create');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('income.base.edit', [
            'formValue' => IncomeBase::where(['id' => $id])->first()->toArray()
        ]);
    }

    /**
     * @param Request $request
     * @param IncomeBase $incomeBase
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, IncomeBase $incomeBase)
    {
        $model = $incomeBase;
        if (isset($request['id'])) {
            $model = $incomeBase->where(['id' => $request['id']])->first();
        }

        $model->fill($request->input());
        $model->user_id = Auth::id();
        $result = $model->save();

        return $this->resultRedirect($result, [__('main.message.saved')], [__('main.message.save_error')]);
    }
}
