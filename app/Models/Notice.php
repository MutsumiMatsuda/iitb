<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
  use HasFactory;

  protected $guarded = array('id');

  // バリデーションルール
  public static $rules = array(
    'line' => 'required',
  );
}
