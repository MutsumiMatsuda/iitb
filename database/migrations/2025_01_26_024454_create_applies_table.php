<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('applies', function (Blueprint $table) {
      $table->id();
      $table->string('name')->comment('お名前');
      $table->string('kana')->comment('よみがな');
      $table->string('zip')->comment('〒番号');
      $table->string('address')->comment('住所');
      $table->string('tel')->comment('電話番号');
      $table->string('email')->comment('メールアドレス');
      $table->integer('children')->length(2)->comment('参加子供人数');
      $table->integer('adults')->length(2)->comment('参加大人人数');
      $table->integer('plan_id')->length(2)->comment('旅行プランID');
      $table->date('day')->comment('出発日');
      $table->text('message')->comment('メッセージ');
      $table->integer('status')->length(2)->default(0)->comment('ステータス');
      $table->timestamps();
      $table->timestamp('finished_at')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('applies');
  }
};
