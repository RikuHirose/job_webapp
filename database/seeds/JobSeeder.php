<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('jobs')->insert([
        [
         'bg_image_id'               => 1,
         'company_id'                => 1,
         'title'                     => '【PMO担当募集！】社内向けシステム開発プロジェクトのマネジメント業務をお任せします。',
         'description'               => '社内向けシステム開発プロジェクトマネジメント業務を担って下さる方を募集します。',
         'application_qualification' => 'カスタマーサクセスの立ち上げ・体制構築のご経験',
         'salary_min'                => '10万円',
         'salary_max'                => '20万円',
         'work_place'                => 1,
        ]
      ]);
    }
}
