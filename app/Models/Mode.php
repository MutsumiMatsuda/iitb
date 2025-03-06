<?php

namespace App\Models;

class Mode {
  /* ------------------------------------------------
    インスタンスメンバー
   ------------------------------------------------*/
   // 画面モード
   public $mode = self::CONFIRM;
   // 入力部品を読み取り専用とするか
   public $readonly = '';
   // セレクトボックスを読み取り専用とするか
   public $disabled = '';
   // post先
   public $route = '';
   // 画面のタイトル
   public $title = '';
   // 案内メッセージ
   public $guide = '';
   // ボタン表記
   public $button = '';

   /* ------------------------------------------------
     スタティックメンバー
      ------------------------------------------------*/
  public function __construct($mode, $title, $route, $guide, $button) {
    $this->mode = $mode;
    $this->title = $title;
    $this->route = $route;
    $this->guide = $guide;
    $this->button = $button;
    if (!$this->isInput()) {
      $this->readonly = "readonly";
      $this->disabled = "disabled";
    }
  }

  // 入力画面かの真偽値を返す
  public function isInput() {
    return self::CONFIRM == $this->mode;
  }

  // 定数
  const CONFIRM = 0;
  const DONE = 1;
}