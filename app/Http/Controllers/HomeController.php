<?php

namespace App\Http\Controllers;

use App\Repository\CostBaseRepository;
use App\Repository\ExchangeRateRepository;
use App\Repository\IncomeBaseRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * @var IncomeBaseRepository
     */
    protected $incomeBaseRepository;
    /**
     * @var CostBaseRepository
     */
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

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {

        $exchangeRate = new ExchangeRateRepository();

        $userId = Auth::id();

        return view('home.index', [
            'incomeBase' => $this->incomeBaseRepository->getByUserId($userId),
            'costBase' => $this->costBaseRepository->getByUserId($userId),
            'base_info' => [
                'balance' => $this->incomeBaseRepository->getBalanceByUserId($userId),
                'costs' => $this->costBaseRepository->getTotalCostsByUserId($userId),
            ],
            'exchangeRate' => $exchangeRate->getRatePrivateBank(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getMakingCostsData(Request $request)
    {
        if ($request->ajax()) {
            Validator::make($request->input(), [
                'incomeId' => 'exists:income_base,id',
                'costId' => 'exists:cost_base,id',
            ])->validate();

            $incomeData = $this->incomeBaseRepository->getById($request['incomeId'])->toArray();
            $costData = $this->costBaseRepository->getById($request['costId'])->toArray();

            return response()->json(['income' => $incomeData, 'cost' => $costData]);
        }
    }
}
