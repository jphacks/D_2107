<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->date('work_start_date');
            $table->date('work_end_date');
            $table->bigInteger('master_occupation_id')->unsigned();
            $table->bigInteger('master_business_id')->unsigned();
            $table->timestamps();

            // 外部キー制約
            $table->foreign('master_occupation_id')->references('id')->on('master_occupations')->onDelete('cascade');
            $table->foreign('master_business_id')->references('id')->on('master_businesses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_experiences');
    }
}
