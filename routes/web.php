<?php

use App\Http\Controllers\Income\IncomeBaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(["reset" => false, 'confirm' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/get-making-cost-data', [App\Http\Controllers\HomeController::class, 'getMakingCostsData'])->name('home.getMakingCostsData');


Route::get('', [App\Http\Controllers\HomeController::class, 'index']);

Route::group(['prefix' => 'income', 'as' => 'income.', 'middleware' => ['auth']], function () {
    Route::get('base/create', [IncomeBaseController::class, 'create'])->name('base_create');
    Route::get('base/edit/{id}', [IncomeBaseController::class, 'edit'])->name('base_edit') -> where(['id' => '[0-9]+']);
    Route::post('base/save', [IncomeBaseController::class, 'save'])->name('base_save');
});
Route::group(['prefix' => 'cost', 'as' => 'cost.', 'middleware' => ['auth']], function () {
    Route::get('base/create', [\App\Http\Controllers\Cost\CostBaseController::class, 'create'])->name('base_create');
    Route::get('base/edit/{id}', [\App\Http\Controllers\Cost\CostBaseController::class, 'edit'])->name('base_edit') -> where(['id' => '[0-9]+']);

    Route::post('base/store', [\App\Http\Controllers\Cost\CostBaseController::class, 'store'])->name('base_store');
    Route::post('base/update', [\App\Http\Controllers\Cost\CostBaseController::class, 'update'])->name('base_update');

});

Route::group(['prefix' => 'cost-log', 'as' => 'cost_log.', 'middleware' => ['auth']], function () {
    Route::post('making-costs', [\App\Http\Controllers\Cost\CostLogController::class, 'makingCosts'])->name('makingCosts');
});

Route::group(['prefix' => 'income-log', 'as' => 'income_log.', 'middleware' => ['auth']], function () {
    Route::post('add-income', [\App\Http\Controllers\Income\IncomeLogController::class, 'addIncome'])->name('addIncome');
});

