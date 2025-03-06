<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;

//管理画面のファイル呼び出し
include __DIR__ . '/admin.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('phpinfo', function () {
  return phpinfo();
});

Route::get('/', [TopController::class, 'index'])->name('index');
Route::get('plan_detail', [TopController::class, 'planDetail'])->name('plan.detail');

Route::get('plan_apply', [TopController::class, 'planApply'])->name('plan.apply');
Route::post('plan_apply_confirm', [TopController::class, 'planApplyConfirm'])->name('plan.apply.confirm');
Route::post('plan_apply_done', [TopController::class, 'planApplyDone'])->name('plan.apply.done');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

