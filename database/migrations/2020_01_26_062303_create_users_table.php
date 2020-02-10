<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('cover_url')->nullable();
            $table->string('name');
            $table->string('email');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->date('birthday')->nullable();

            $table->unsignedBigInteger('office_time_request')->nullable();
            $table->unsignedBigInteger('work_time_request')->nullable();

            $table->longText('description')->nullable();

            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
