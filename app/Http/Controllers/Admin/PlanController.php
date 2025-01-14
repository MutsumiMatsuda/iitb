<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Carbon\Carbon;

class PlanController extends Controller
{
  public function index() {
    $plans = Plan::getAllValid();
    return view('admin.plan.index', compact(['plans']));
  }

  public function add() {
    return view('admin.plan.create');
  }

  /*
    旅行プランの保存
  */
  public function create(Request $rq) {
    // Validation
    $this->validate($rq, Plan::$rules);

    // 旅行プランを保存
    $plan = new Plan;
    $form = $rq->all();

    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    /*
    if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $plan->image_path = basename($path);
    } else {
        $plan->image_path = null;
    }
    */

    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    unset($form['image']);

    // データベースに保存する
    $plan->fill($form);
    $plan->save();

    return redirect('admin/plan');
  }

  /*
    編集多面表示
  */
  public function edit(Request $rq) {
    $plan = Plan::find($rq->id);
    if (empty($plan)) {
      abort(404);
    }
    return view('admin.plan.edit', compact(['plan']));
  }

  /*
    旅行プランの更新
  */
  public function update(Request $rq) {
    // Validation
    $this->validate($rq, Plan::$rules);

    // 旅行プランを保存
    $plan = Plan::find($rq->id);
    $form = $rq->all();

    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    /*
    if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $plan->image_path = basename($path);
    } else {
        $plan->image_path = null;
    }
    */

    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    unset($form['image']);

    // データベースに保存する
    $plan->fill($form);
    $plan->save();

    return redirect('admin/plan');
  }

  /*
    旅行プランの論理削除
  */
  public function delete(Request $rq) {
    $plan = Plan::find($rq->id);
    $plan->deleted_at = Carbon::now();
    $plan->save();
    return redirect('admin/plan');
  }

  /*
    削除済みプラン一覧の表示
  */
  public function deletedIndex() {
    $plans = Plan::getAllDeleted();
    return view('admin.plan.deleted', compact(['plans']));
  }

  /*
    削除済みプランを復活
  */
  public function revive(Request $rq) {
    $plan = Plan::find($rq->id);
    $plan->deleted_at = null;
    $plan->save();
    return redirect('admin/plan');  }
}
