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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('sorter')->length(4)->unique()->comment('表示順(降順で使用)');
            $table->date('day')->comment('登録日');
            $table->string('title')->comment('題名');
            $table->text('line')->nullable()->comment('内容');
            $table->timestamps();
            $table->timestamp('hidden_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
