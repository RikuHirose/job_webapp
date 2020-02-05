<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $skills = [
        'HTML/CSS',
        'JavaScript',
        'React.js',
        'Vue.js',
        'Node.js',
        'Swift',
        'Kotlin',
        'Unity',
        'Java',
        'PHP',
        'Perl',
        'Ruby',
        'Python',
        'Go',
        'Scala',
        'AWS',
        'GCP',
        'Kubernetes',
        'Firebase',
        '機械学習',
        'Docker',
        'Flutter',
        'TypeScript',
        'Rails',
      ];

        foreach ($skills as $key => $value) {
            DB::table('skills')->insert([
          [
              'name'       => $value,
          ],
        ]);
        }
    }
}
