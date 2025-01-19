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
          'sorter' => 1,
          'day' => new Carbon('2024/03/25'),
          'no' => '24_01',
          'title' => '奇跡のブルーが煌めく南太平洋の、憧れの楽園タヒチ',
          'sub_title' => 'タヒチ５・８日間',
          'brief_report' => '「はっ」とする、海の青のグラデェーション、漆黒の夜空に満天の星々“タヒチ”',
          'image_front' => '2024shimoki_tahichi-1_4.jpg',
          'image_back' => '2024shimoki_tahichi-2_3.jpg',
          'pdf' => '2024shimoki_tahichi-.pdf',
          'departure_date' => '2024年10月　～　2025年０3月',
          'departure_date_detail' => '2024年10月　～　2025年０3月　５日間；金曜日、８日間；火・金曜日',
          'itinerary' => 'パンフレットご参照ください　(アレンジ賜ります)。',
          'expense' => '３４２，０００～７５１，０００円',
          'airline' => 'エア タヒチ ヌイ',
          'airline_detail' => 'エア タヒチ ヌイ(国際線)、日本航空(日本国内)、エア タヒチ(タヒチ内）',
          'hotel' => 'パンフレットご用意しております、（ホテルご相談ください）',
          'departure_place' => '小松空港',
          'departure_place_detail' => '小松空港より、(全国各地ご出発地はご相談に応じます)',
          'guide' => '',
          'needed_customers' => 2,
          'report' => "奇跡のブルーが煌く、南太平洋の憧れの楽園、\nタヒチとその島々は、南太平洋に広がる118の島々からなり、\n類い希な自然の美しさと、ゆったりと流れる時間、世界中から\n究極のバカンスを求め人々が集まってくる常夏の楽園です。\nどこまでも広がる抜けるような青空、緑濃くそびえ立つ印象的\nな山々、クリスタルのように透きとおったブルーラグーン。\nあかね色にもえる夕日。あなたが今まで過ごした事のない\n時間の流れがそこにあります。是非訪れて見ませんか？。",
          'news' => '2024年10月～2025年3月のタヒチのパンフレットできました',
          'created_at' => new DateTime(),
        ],
        /*
        [
          'day' => new Carbon('2024/06/29'),
          'name' => '大韓航空で行く、とっても便利ソウル３・４日間；小松発着',
          'link' => 'http://iitb.jp/tabiinfo24_05.html',
          'note' => null,
          'img' => null,
          'created_at' => new DateTime(),
        ],
        [
          'day' => new Carbon('2024/04/27'),
          'name' => 'まなびっこツアー、お仕事体験ツアー沖縄４日間',
          'link' => 'http://iitb.jp/tabiinfo24_07.html',
          'note' => null,
          'img' => null,
          'created_at' => new DateTime(),
        ],
        [
          'day' => new Carbon('2024/03/25'),
          'name' => '2024年４月からの、らくらく台北４日間；小松発着、エバー航空で行く',
          'link' => 'http://iitb.jp/tabiinfo24_06.html',
          'note' => null,
          'img' => null,
          'created_at' => new DateTime(),
        ],
        */
      ]);
    }
}
