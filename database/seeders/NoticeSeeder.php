<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('notices')->insert([
        [
          'line' => '<span style="color : #ff0000;">〇えちぜん店、10月24日(木)臨時休業します！！。</span> 　　　　　　　　　　　　　　　　　2024年下期タヒチ　パンフレット出来上がりました、福井の旅行会社が造成するタヒチです、地方空港からのタヒチは、
          弊社にお任せください。10月29日よりエア タヒチ ヌイ運航再開します、お出かけお待ちしております。          ',
        ],
      ]);
    }
}
