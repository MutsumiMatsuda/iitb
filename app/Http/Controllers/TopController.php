<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Plan;

class TopController extends Controller
{
  // トップページ表示
  public function index() {
    $plans = Plan::getAllValid();
    $notice = Notice::find(1);
    return view('top', compact(['notice', 'plans']));
  }

  // 旅行プラン詳細ページ
  public function planDetail(Request $rq) {
    $plan = Plan::find($rq->id);
    if (empty($plan)) {
      abort(404);
    }

    return view('plan', compact(['plan']));
  }
}
