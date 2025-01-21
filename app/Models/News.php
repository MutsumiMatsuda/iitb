<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    /* ------------------------------------------------
      インスタンスメンバー
     ------------------------------------------------*/
    protected $guarded = array('id');

    /* ------------------------------------------------
      スタティックメンバー
     ------------------------------------------------*/
    // バリデーションルール
    public static $rules = array(
      'day' => 'required',
      'title' => 'required',
      'line' => 'required',
    );

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
      $news = self::orderBy('sorter', 'desc')->get();
      $target = self::find($id);
      if ($target->sorter != self::max('sorter')) {
        $targetSorter = $target->sorter;

        foreach($news as $item) {
          // 自分より表示順が前で且つ非表示になっていないプランの表示順番号を入れ替える
          // 見つからなかった場合は元々最初に表示されているということなので何もしない
          if ($item->sorter > $targetSorter && empty($item->hidden_at)) {
            $target->sorter = 0xffff;
            $target->save();
            $item->sorter = $targetSorter;
            $item->save();
            $target->sorter = $targetSorter + 1;
            $target->save();
            break;
          }
        }
      }
    }

    // 指定プランの表示順を下げる
    public static function lower($id) {
      $news = self::orderBy('sorter', 'asc')->get();
      $target = self::find($id);
      if ($target->sorter != self::min('sorter')) {
        $targetSorter = $target->sorter;
        $target->sorter = 0xffff;
        $target->save();
        foreach($news as $item) {
          // 自分より表示順が後で且つ非表示になっていないプランの表示順番号を入れ替える
          // 見つからなかった場合は元々最後に表示されているということなので何もしない
          if ($item->sorter < $targetSorter && empty($item->hidden_at)) {
            $item->sorter = $targetSorter;
            $item->save();
            break;
          }
        }
        $target->sorter = $targetSorter - 1;
        $target->save();
      }
    }
}
