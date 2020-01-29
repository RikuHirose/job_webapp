<?php

use Illuminate\Database\Seeder;

class JobOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('job_occupations')->insert([
        [
         'job_id'        => 1,
         'occupation_id' => 2,
        ],
        [
         'job_id'        => 1,
         'occupation_id' => 3,
        ]
      ]);
    }
}
