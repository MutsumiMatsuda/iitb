<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
  // お知らせ一覧表示
  public function index() {
    $news = News::getAllValid();
    return view('admin.news.index', compact(['news']));
  }

  // お知らせ一新規登録画面表示
  public function add() {
    return view('admin.news.create');
  }

  /*
    お知らせの新規登録
  */
  public function create(Request $rq) {
    // Validation
    $this->validate($rq, News::$rules);

    // お知らせを保存
    $news = new News;
    $form = $rq->all();

    /*
    // 画像やpdfが送信された場合の処理
    $nextId = News::getNextId();
    $filePath = 'public/image/news/' . $nextId . '/';
    if (isset($form['image_front'])) {
      $fileObj = $rq->file('image_front');
      $news->image_front = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $news->image_front);
    } else {
      $news->image_front = null;
    }

    if (isset($form['image_back'])) {
      $fileObj = $rq->file('image_back');
      $news->image_back = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $news->image_back);
    } else {
      $news->image_back = null;
    }

    if (isset($form['pdf'])) {
      $fileObj = $rq->file('pdf');
      $news->pdf = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $news->pdf);
    } else {
      $news->pdf = null;
    }
    */

    // フォームの不要要素を削除
    unset($form['_token'], $form['image_front'], $form['image_back'], $form['pdf']);

    // データベースに保存する
    $news->fill($form);
    $news->sorter = News::getNextSorter();
    $news->save();

    return redirect('admin/news');
  }

  /*
    編集多面表示
  */
  public function edit(Request $rq) {
    $news = News::find($rq->id);
    if (empty($news)) {
      abort(404);
    }
    return view('admin.news.edit', compact(['news']));
  }

  /*
    お知らせの更新
  */
  public function update(Request $rq) {
    // Validation
    $this->validate($rq, News::$rules);

    // お知らせを保存
    $news = News::find($rq->id);
    if (empty($news)) {
      abort(404);
    }

    $form = $rq->all();

    /*
    // 画像やpdfが送信された場合の処理
    $filePath = 'public/image/news/' . $news->id . '/';
    if (isset($form['image_front'])) {
      //以前アップロードされたファイルがあれば削除
      if (!empty($news->image_front)) {
        Storage::delete($filePath . $news->image_front);
      }
      $fileObj = $rq->file('image_front');
      $news->image_front = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $news->image_front);
    }

    if (isset($form['image_back'])) {
      //以前アップロードされたファイルがあれば削除
      if (!empty($news->image_back)) {
        Storage::delete($filePath . $news->image_back);
      }
      $fileObj = $rq->file('image_back');
      $news->image_back = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $news->image_back);
    }

    if (isset($form['pdf'])) {
      //以前アップロードされたファイルがあれば削除
      if (!empty($news->pdf)) {
        Storage::delete($filePath . $news->pdf);
      }
      $fileObj = $rq->file('pdf');
      $news->pdf = $fileObj->getClientOriginalName();
      $fileObj->storeAs($filePath . $news->pdf);
    }
    */

    // フォームの不要要素を削除
    unset($form['_token'], $form['image_front'], $form['image_back'], $form['pdf']);

    // データベースに保存する
    $news->fill($form);
    $news->save();

    return redirect('admin/news');
  }

  /*
    お知らせを非表示にする
  */
  public function hide(Request $rq) {
    $news = News::find($rq->id);
    if (empty($news)) {
      abort(404);
    }

    $news->hidden_at = Carbon::now();
    $news->save();
    return redirect('admin/news');
  }

  /*
    非表示お知らせ一覧の表示
  */
  public function hiddenIndex() {
    $news = News::getAllDeleted();
    return view('admin.news.hidden', compact(['news']));
  }

  /*
    非表示お知らせを表示
  */
  public function expose(Request $rq) {
    $news = News::find($rq->id);
    if (empty($news)) {
      abort(404);
    }
    $news->hidden_at = null;
    $news->save();
    return redirect('admin/news');
  }

  /*
    該当プランの表示順を上げる
  */
  public function mvup(Request $rq) {
    $news = News::find($rq->id);
    if (empty($news)) {
      abort(404);
    }
    News::raise($rq->id);
    return redirect('admin/news');
  }

  /*
    該当プランの表示順を下げる
  */
  public function mvdw(Request $rq) {
    $news = News::find($rq->id);
    if (empty($news)) {
      abort(404);
    }
    News::lower($rq->id);
    return redirect('admin/news');
  }
}