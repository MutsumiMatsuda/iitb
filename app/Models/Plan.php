<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  use HasFactory;

  /* ------------------------------------------------
    インスタンスメンバー
   ------------------------------------------------*/
  protected $guarded = array('id');

  // 各ファイルへのURLを返す
  protected function getUrlBase() {
    return self::$fileUrlBase . $this->id . '/';
  }

  public function getFrontImgUrl() {
    return $this->getUrlBase() . $this->image_front;
  }

  public function getBackImgUrl() {
    return $this->getUrlBase() . $this->image_back;
  }

  public function getPdfUrl() {
    return $this->getUrlBase() . $this->pdf;
  }

  /* ------------------------------------------------
    スタティックメンバー
   ------------------------------------------------*/
  // バリデーションルール
  public static $rules = array(
    'no' => 'required',
    'day' => 'required',
    'title' => 'required',
    'brief_report' => 'required',
    'needed_customers' => 'numeric',
  );

  // ファイルパスのベース
  public static $filePathBase = 'public/image/plan/';
  public static $fileUrlBase = 'storage/image/plan/';

  // 次のIDを取得
  public static function getNextId() {
    return self::max('id') + 1;
  }

  // 次の表示順番号を取得
  public static function getNextSorter() {
    return self::max('sorter') + 1;
  }

  // 有効なプランを日付の降順で取得
  public static function getAllValid() {
    return self::where('hidden_at', null)->orderBy('sorter', 'desc')->get();
  }

  // 削除されたプランを日付の降順で取得
  public static function getAllDeleted() {
    return self::whereNotNull('hidden_at')->orderBy('sorter', 'desc')->get();
  }

  // 指定プランの表示順を上げる
  public static function raise($id) {
    $plans = self::orderBy('sorter', 'desc')->get();
    $target = self::find($id);
    if ($target->sorter != self::max('sorter')) {
      $targetSorter = $target->sorter;

      foreach($plans as $plan) {
        // 自分より表示順が前で且つ非表示になっていないプランの表示順番号を入れ替える
        // 見つからなかった場合は元々最初に表示されているということなので何もしない
        if ($plan->sorter > $targetSorter && empty($plan->hidden_at)) {
          $target->sorter = 0xffff;
          $target->save();
          $plan->sorter = $targetSorter;
          $plan->save();
          $target->sorter = $targetSorter + 1;
          $target->save();
          break;
        }
      }
    }
  }

  // 指定プランの表示順を下げる
  public static function lower($id) {
    $plans = self::orderBy('sorter', 'asc')->get();
    $target = self::find($id);
    if ($target->sorter != self::min('sorter')) {
      $targetSorter = $target->sorter;
      $target->sorter = 0xffff;
      $target->save();
      foreach($plans as $plan) {
        // 自分より表示順が後で且つ非表示になっていないプランの表示順番号を入れ替える
        // 見つからなかった場合は元々最後に表示されているということなので何もしない
        if ($plan->sorter < $targetSorter && empty($plan->hidden_at)) {
          $plan->sorter = $targetSorter;
          $plan->save();
          break;
        }
      }
      $target->sorter = $targetSorter - 1;
      $target->save();
    }
  }
}
