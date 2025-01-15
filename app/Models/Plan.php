<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  use HasFactory;

  protected $guarded = array('id');

  // バリデーションルール
  public static $rules = array(
    'day' => 'required',
    'name' => 'required',
    'link' => 'required',
  );

  // 有効なプランを日付の降順で取得
  public static function getAllValid() {
    return self::where('hidden_at', null)->orderBy('day', 'desc')->get();
  }

  // 削除されたプランを日付の降順で取得
  public static function getAllDeleted() {
    return self::whereNotNull('hidden_at')->orderBy('day', 'desc')->get();
  }
}
