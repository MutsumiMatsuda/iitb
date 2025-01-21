<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NoticeController;
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
  Route::get('plan/hide', [PlanController::class, 'hide'])->name('admin.plan.hide');
  Route::get('plan/hidden', [PlanController::class, 'hiddenIndex'])->name('admin.plan.hidden');
  Route::get('plan/expose', [PlanController::class, 'expose'])->name('admin.plan.expose');
  Route::get('plan/mvup', [PlanController::class, 'mvup'])->name('admin.plan.mvup');
  Route::get('plan/mvdw', [PlanController::class, 'mvdw'])->name('admin.plan.mvdw');

  Route::get('news', [NewsController::class, 'index'])->name('admin.news.index');
  Route::get('news/add', [NewsController::class, 'add'])->name('admin.news.add');
  Route::post('news/create', [NewsController::class, 'create'])->name('admin.news.create');
  Route::get('news/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
  Route::post('news/update', [NewsController::class, 'update'])->name('admin.news.update');
  Route::get('news/hide', [NewsController::class, 'hide'])->name('admin.news.hide');
  Route::get('news/hidden', [NewsController::class, 'hiddenIndex'])->name('admin.news.hidden');
  Route::get('news/expose', [NewsController::class, 'expose'])->name('admin.news.expose');
  Route::get('news/mvup', [NewsController::class, 'mvup'])->name('admin.news.mvup');
  Route::get('news/mvdw', [NewsController::class, 'mvdw'])->name('admin.news.mvdw');

  Route::get('notice/edit', [NoticeController::class, 'edit'])->name('admin.notice.edit');
  Route::post('notice/update', [NoticeController::class, 'update'])->name('admin.notice.update');
});
