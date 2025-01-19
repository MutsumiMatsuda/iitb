<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PlanController extends Controller
{
  // 旅行プラン一覧表示
  public function index() {
    $plans = Plan::getAllValid();
    return view('admin.plan.index', compact(['plans']));
  }

  // 旅行プラン一新規登録画面表示
  public function add() {
    return view('admin.plan.create');
  }

  /*
    旅行プランの新規登録
  */
  public function create(Request $rq) {
    // Validation
    $this->validate($rq, Plan::$rules);

    // 旅行プランを保存
    $plan = new Plan;
    $form = $rq->all();

    // 画像やpdfが送信された場合の処理
    $nextId = Plan::getNextId();
    $filePath = 'public/image/plan/' . $nextId . '/';
    if (isset($form['image_front'])) {
      $fileObj = $rq->file('image_front');
      $plan->image_front = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $plan->image_front);
    } else {
      $plan->image_front = null;
    }

    if (isset($form['image_back'])) {
      $fileObj = $rq->file('image_back');
      $plan->image_back = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $plan->image_back);
    } else {
      $plan->image_back = null;
    }

    if (isset($form['pdf'])) {
      $fileObj = $rq->file('pdf');
      $plan->pdf = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $plan->pdf);
    } else {
      $plan->pdf = null;
    }

    // フォームの不要要素を削除
    unset($form['_token'], $form['image_front'], $form['image_back'], $form['pdf']);

    // データベースに保存する
    $plan->fill($form);
    $plan->sorter = Plan::getNextSorter();
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
    if (empty($plan)) {
      abort(404);
    }

    $form = $rq->all();

    // 画像やpdfが送信された場合の処理
    $filePath = 'public/image/plan/' . $plan->id . '/';
    if (isset($form['image_front'])) {
      //以前アップロードされたファイルがあれば削除
      if (!empty($plan->image_front)) {
        Storage::delete($filePath . $plan->image_front);
      }
      $fileObj = $rq->file('image_front');
      $plan->image_front = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $plan->image_front);
    }

    if (isset($form['image_back'])) {
      //以前アップロードされたファイルがあれば削除
      if (!empty($plan->image_back)) {
        Storage::delete($filePath . $plan->image_back);
      }
      $fileObj = $rq->file('image_back');
      $plan->image_back = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $plan->image_back);
    }

    if (isset($form['pdf'])) {
      //以前アップロードされたファイルがあれば削除
      if (!empty($plan->pdf)) {
        Storage::delete($filePath . $plan->pdf);
      }
      $fileObj = $rq->file('pdf');
      $plan->pdf = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $plan->pdf);
    }

    // フォームの不要要素を削除
    unset($form['_token'], $form['image_front'], $form['image_back'], $form['pdf']);

    // データベースに保存する
    $plan->fill($form);
    $plan->save();

    return redirect('admin/plan');
  }

  /*
    旅行プランを非表示にする
  */
  public function hide(Request $rq) {
    $plan = Plan::find($rq->id);
    if (empty($plan)) {
      abort(404);
    }

    $plan->hidden_at = Carbon::now();
    $plan->save();
    return redirect('admin/plan');
  }

  /*
    非表示旅行プラン一覧の表示
  */
  public function hiddenIndex() {
    $plans = Plan::getAllDeleted();
    return view('admin.plan.hidden', compact(['plans']));
  }

  /*
    非表示旅行プランを表示
  */
  public function expose(Request $rq) {
    $plan = Plan::find($rq->id);
    if (empty($plan)) {
      abort(404);
    }
    $plan->hidden_at = null;
    $plan->save();
    return redirect('admin/plan');
  }

  /*
    該当プランの表示順を上げる
  */
  public function mvup(Request $rq) {
    $plan = Plan::find($rq->id);
    if (empty($plan)) {
      abort(404);
    }
    Plan::raise($rq->id);
    return redirect('admin/plan');
  }

  /*
    該当プランの表示順を下げる
  */
  public function mvdw(Request $rq) {
    $plan = Plan::find($rq->id);
    if (empty($plan)) {
      abort(404);
    }
    Plan::lower($rq->id);
    return redirect('admin/plan');
  }
}