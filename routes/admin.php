<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\LoginController;

Route::prefix('admin')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('admin.login.index');
  Route::post('login', [LoginController::class, 'login'])->name('admin.login.login');

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
  Route::get('/', [TopController::class, 'dashboard'])->name('admin.dashboard');
  Route::get('logout', [LoginController::class, 'logout'])->name('admin.login.logout');

  Route::get('plan', [PlanController::class, 'index'])->name('admin.plan.index');
  Route::get('plan/add', [PlanController::class, 'add'])->name('admin.plan.add');
  Route::post('plan/create', [PlanController::class, 'create'])->name('admin.plan.create');
  Route::get('plan/edit', [PlanController::class, 'edit'])->name('admin.plan.edit');
  Route::post('plan/update', [PlanController::class, 'update'])->name('admin.plan.update');
  Route::get('plan/delete', [PlanController::class, 'delete'])->name('admin.plan.delete');
  Route::get('plan/deleted', [PlanController::class, 'deletedIndex'])->name('admin.plan.deleted');
  Route::get('plan/revive', [PlanController::class, 'revive'])->name('admin.plan.revive');
});
