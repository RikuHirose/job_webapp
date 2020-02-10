<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(UsersTableSeeder::class);

        $this->call(SkillSeeder::class);
        $this->call(OccupationSeeder::class);
        // $this->call(FileSeeder::class);

        $this->call(CompanySeeder::class);
        $this->call(JobSeeder::class);

        $this->call(JobSkillSeeder::class);
        $this->call(JobOccupationSeeder::class);

        $this->call(AdminSeeder::class);
    }
}
