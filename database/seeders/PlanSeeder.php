<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DateTime;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('plans')->insert([
        [
          'day' => new Carbon('2024/03/25'),
          'name' => '奇跡のブルーが煌めく　南太平洋の、憧れの楽園；タヒチ５・８日間;小松空港発着',
          'link' => 'http://iitb.jp/tabiinfo24_01.html',
          'note' => '2024年10月～2025年3月のタヒチのパンフレットできました',
          'created_at' => new DateTime(),
        ],
        [
          'day' => new Carbon('2024/06/29'),
          'name' => '大韓航空で行く、とっても便利ソウル３・４日間；小松発着',
          'link' => 'http://iitb.jp/tabiinfo24_05.html',
          'note' => null,
          'created_at' => new DateTime(),
        ],
        [
          'day' => new Carbon('2024/04/27'),
          'name' => 'まなびっこツアー、お仕事体験ツアー沖縄４日間',
          'link' => 'http://iitb.jp/tabiinfo24_07.html',
          'note' => null,
          'created_at' => new DateTime(),
        ],
        [
          'day' => new Carbon('2024/03/25'),
          'name' => '2024年４月からの、らくらく台北４日間；小松発着、エバー航空で行く',
          'link' => 'http://iitb.jp/tabiinfo24_06.html',
          'note' => null,
          'created_at' => new DateTime(),
        ],
      ]);
    }
}
