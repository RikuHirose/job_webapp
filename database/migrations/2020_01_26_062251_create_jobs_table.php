<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('bg_image_id')->index();
            $table->unsignedBigInteger('company_id')->index();

            $table->string('title');
            $table->longText('description');
            $table->longText('application_qualification');

            $table->string('salary_min')->nullable();
            $table->string('salary_max')->nullable();
            $table->string('work_place')->nullable();

            $table->foreign('bg_image_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
