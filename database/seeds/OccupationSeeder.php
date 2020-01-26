<?php

use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $occupations = [
        'Android',
        'iOS',
        'PM',
        'Webフロント',
        'インフラ',
        'ゲームネイティブ',
        'サーバサイド',
      ];

        foreach ($occupations as $key => $value) {
            DB::table('occupations')->insert([
          [
              'name'       => $value,
          ],
        ]);
        }
    }
}
