<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DateTime;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('news')->insert([
        [
          'sorter' => 1,
          'day' => new Carbon('2024/12/17'),
          'title' => '年末・年始、営業時間 ご案内',
          'line' => '(ベル店、えちぜん店)\n１２月２８日(土)大掃除をしております、緊急の場合は対応致します。\n１２月２９日(日)～2025年１月０３(金)、休業とさせていただきます。\n2025年１月４日(土)、通常営業させていただきます。',
          'created_at' => new DateTime(),
        ],
      ]);
    }
}
