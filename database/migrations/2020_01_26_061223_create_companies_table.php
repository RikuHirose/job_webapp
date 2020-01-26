<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('logo_image_id')->index()->nullable();
            $table->string('name');
            $table->string('email');

            $table->longText('description')->nullable();
            $table->text('address')->nullable();
            $table->date('founded_at')->nullable();
            $table->string('ceo_name')->nullable();
            $table->string('staff_number_type')->nullable();
            $table->string('website_url')->nullable();

            $table->foreign('logo_image_id')->references('id')->on('files')->onDelete('set null');

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
        Schema::dropIfExists('companies');
    }
}
