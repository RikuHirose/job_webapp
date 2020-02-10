<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      DB::table('companies')->insert([
        [
         'logo_url'          => 'https://pbs.twimg.com/profile_images/987260951375130624/8garEn-Z_400x400.jpg',
         'name'              => 'GAOGAO',
         'email'             => 'test@test.com',
         'description'       => 'シンガポール本社のスタートアップ・スタジオ。バンコク/東京/ホーチミンに子会社登記してエンジニア30名以上でグローバルに15社以上のお客様の起業や開発を支援をしています。',
         'address'           => 'test',
         'founded_at'        => '2020-01-11 08:09:52',
         'ceo_name'          => 'tejima',
         'staff_number_type' => 1,
         'website_url'       => 'https://gaogao.asia/',
        ]
      ]);
    }
}
