<?php

namespace App\Http\Controllers\Cost;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ControllerHelper;
use App\Models\Cost\CostBase;
use App\Repository\CostBaseRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class CostBaseController
 * @package App\Http\Controllers\Cost
 */
class CostBaseController extends Controller
{
    use ControllerHelper;

    /**
     * @var CostBaseRepository
     */
    private $costBaseRepository;

    /**
     * CostBaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->costBaseRepository = new CostBaseRepository();
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('cost.base.create');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('cost.base.edit', [
            'formValue' => $this->costBaseRepository->getById($id)->toArray()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request_data = $request->except('_token');
        $request_data['user_id'] = Auth::id();

        Validator::make($request_data,
            [
                'title' => 'required',
                'total' => 'required',
                'user_id' => 'required'
            ]
        )->validate();

        $result = CostBase::create($request_data);

        return $this->resultRedirect($result, [__('main.message.saved')], [__('main.message.save_error')]);
    }

    /**
     * @param Request $request
     * @param CostBase $costBase
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, CostBase $costBase)
    {
        $request_data = $request->except('_token');
        $request_data['user_id'] = Auth::id();

        Validator::make($request_data, [
                'id' => 'required',
                'title' => 'required',
                'total' => 'required',
                'user_id' => 'required'
            ]
        )->validate();

        $result = $costBase->where(['id' => $request_data['id']])->update($request_data);

        return $this->resultRedirect($result, [__('main.message.saved')], [__('main.message.save_error')]);
    }
}
