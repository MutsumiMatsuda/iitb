<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Apply extends Model
{
    use HasFactory;

  /* ------------------------------------------------
    インスタンスメンバー
   ------------------------------------------------*/
  protected $guarded = array('id');

  public function plan() {
    return Plan::find($this->plan_id);
    //return $this->hasOne(Plan::class);
  }

  /* ------------------------------------------------
    スタティックメンバー
   ------------------------------------------------*/
  // バリデーションルール
  public static $rules = array(
    'name' => 'required',
    'kana' => 'required',
    'tel' => 'required',
    'zip' => 'required',
    'address' => 'required',
    'email' => 'required',
    'plan_id' => 'required|numeric',
    'adults' => 'required|numeric',
    'children' => 'required|numeric',
    'day' => 'required',
  );
}
