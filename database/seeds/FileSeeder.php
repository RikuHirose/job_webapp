<?php

use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $files = [
        'https://pbs.twimg.com/profile_banners/919769067497467909/1540006082',
        'https://pbs.twimg.com/profile_images/987260951375130624/8garEn-Z_400x400.jpg',
      ];

        foreach ($files as $key => $value) {
            DB::table('files')->insert([
          [
              'url'       => $value,
          ],
        ]);
        }
    }
}
