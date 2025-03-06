<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Plan;
use App\Models\News;
use App\Models\Apply;
use App\Models\Mode;
use App\Mail\ApplyMail;
use Illuminate\Support\Facades\Mail;

class TopController extends Controller
{
  // トップページ表示
  public function index() {
    $plans = Plan::getAllValid();
    $news = News::getAllValid();
    $notice = Notice::find(1);
    return view('top', compact(['notice', 'plans', 'news']));
  }

  // 旅行プラン詳細ページ
  public function planDetail(Request $rq) {
    $plan = Plan::find($rq->id);
    if (empty($plan)) {
      abort(404);
    }

    return view('plan', compact(['plan']));
  }

  // 旅行プラン申し込み
  public function planApply(Request $rq) {
    $apl = $this->fillApply($rq);
    //dd($apl->plan());
    $guide = "以下の項目をご入力いただき、内容をご確認ください。";
    $m = new Mode(Mode::CONFIRM, '旅行プランお申し込み', 'plan.apply.confirm', $guide, '入力内容の確認');
    $plans = Plan::getAllValid();
    return view('plan_apply', compact(['m', 'apl', 'plans']));
  }

  // 旅行プラン申し込み確認
  public function planApplyConfirm(Request $rq) {
    $this->validate($rq, Apply::$rules);
    $apl = $this->fillApply($rq);

    $guide = "この内容で申し込みます。よろしいですか？";
    $m = new Mode(Mode::DONE, 'お申し込み内容の確認', 'plan.apply.done', $guide, '確認して送信');
    $plans = Plan::getAllValid();
    return view('plan_apply', compact(['m', 'apl', 'plans']));
  }

  // 旅行プラン申し込み完了
  public function planApplyDone(Request $rq) {

    // 修正ボタンが押された場合は入力画面にリダイレクト
    if($rq->has("correct")){
      $form = $rq->all();
  		return redirect()->route('plan.apply')->withInput($form);
		}

    // データベースに保存
    $apl = $this->fillApply($rq);
    $apl->save();

    // メール送信
    Mail::to('kobato3455@iitb.jp')->send(new ApplyMail($apl));

    return view('plan_apply_done', compact(['apl']));
  }

  // リクエストから申し込み内容を取得し、Applyインスタンスに詰めて返す
  protected function fillApply(Request $rq) {
    $apl = new Apply;
    $form = $rq->all();
    if(0 < count($form)) {
      unset($form['_token'], $form['correct']);
      $apl->fill($form);
    } else {
      $apl->name = '松田睦';
      $apl->kana = 'まつだむつみ';
      $apl->zip = '9100859';
      $apl->address = '福井市日之出1-2-5';
      $apl->tel = '09020929985';
      $apl->email = 'aaa@bbb.com';
      $apl->plan_id = 2;
      $apl->adults = 2;
      $apl->children = 3;
      $apl->day = '2025-03-24';
      $apl->message = 'よろしくお願いします。';
    }
    return $apl;
  }
}
