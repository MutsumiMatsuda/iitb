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
      Schema::create('plans', function (Blueprint $table) {
        $table->id();
        $table->integer('sorter')->length(4)->unique()->comment('表示順(降順で使用)');
        $table->string('no')->comment('ツアー番号');
        $table->date('day')->comment('登録日');
        $table->string('title')->comment('大見出し');
        $table->string('sub_title')->nullable()->comment('小見出し');
        $table->string('brief_report')->comment('概要');
        $table->string('image_front')->nullable()->comment('パンフレット表');
        $table->string('image_back')->nullable()->comment('パンフレット裏');
        $table->string('pdf')->nullable()->comment('ダウンロード用pdf');
        $table->string('departure_date')->nullable()->comment('出発日');
        $table->string('departure_date_detail')->nullable()->comment('出発日詳細');
        $table->string('itinerary')->nullable()->comment('旅行行程');
        $table->string('expense')->nullable()->comment('旅行代金');
        $table->string('airline')->nullable()->comment('航空会社');
        $table->string('airline_detail')->nullable()->comment('航空会社詳細');
        $table->string('hotel')->nullable()->comment('利用ホテル');
        $table->string('departure_place')->nullable()->comment('発着');
        $table->string('departure_place_detail')->nullable()->comment('発着詳細');
        $table->string('guide')->comment('添乗員')->nullable();
        $table->integer('needed_customers')->length(2)->nullable()->comment('最少催行人員');
        $table->string('report')->nullable()->comment('お知らせ');
        $table->string('news')->nullable()->comment('新着情報');
        $table->timestamps();
        $table->timestamp('hidden_at')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('plans');
    }
};
