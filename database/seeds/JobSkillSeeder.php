<?php

use Illuminate\Database\Seeder;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('job_skills')->insert([
        [
         'job_id'    => 1,
         'skill_id'  => 2,
        ],
        [
         'job_id'    => 1,
         'skill_id'  => 3,
        ]
      ]);
    }
}
