<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use Carbon\Carbon;

class NoticeController extends Controller
{
  public function index() {
    $notices = Notice::getAllValid();
    return view('admin.notice.index', compact(['notices']));
  }

  public function add() {
    return view('admin.notice.create');
  }

  /*
    旅行プランの保存
  */
  public function create(Request $rq) {
    // Validation
    $this->validate($rq, Notice::$rules);

    // 旅行プランを保存
    $notice = new Notice;
    $form = $rq->all();

    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    if (isset($form['img'])) {
        $path = $request->file('img')->store('public/image');
        $notice->img = basename($path);
    } else {
        $notice->img = null;
    }

    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    unset($form['img']);

    // データベースに保存する
    $notice->fill($form);
    $notice->save();

    return redirect('admin/notice');
  }

  /*
    編集多面表示
  */
  public function edit(Request $rq) {
    $notice = Notice::find($rq->id);
    if (empty($notice)) {
      abort(404);
    }
    return view('admin.notice.edit', compact(['notice']));
  }

  /*
    旅行プランの更新
  */
  public function update(Request $rq) {
    // Validation
    $this->validate($rq, Notice::$rules);

    // 旅行プランを保存
    $notice = Notice::find($rq->id);
    if (empty($notice)) {
      abort(404);
    }

    $form = $rq->all();

    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    /*
    if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $notice->image_path = basename($path);
    } else {
        $notice->image_path = null;
    }
    */

    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    // unset($form['image']);

    // データベースに保存する
    $notice->fill($form);
    $notice->save();

    return redirect('admin');
  }

  /*
    旅行プランを非表示にする
  */
  public function hide(Request $rq) {
    $notice = Notice::find($rq->id);
    if (empty($notice)) {
      abort(404);
    }

    $notice->hidden_at = Carbon::now();
    $notice->save();
    return redirect('admin/Notice');
  }

  /*
    非表示旅行プラン一覧の表示
  */
  public function hiddenIndex() {
    $notices = Notice::getAllDeleted();
    return view('admin.notice.hidden', compact(['Notices']));
  }

  /*
    非表示旅行プランを表示
  */
  public function expose(Request $rq) {
    $notice = Notice::find($rq->id);
    if (empty($notice)) {
      abort(404);
    }
    $notice->hidden_at = null;
    $notice->save();
    return redirect('admin/Notice');  }
}
