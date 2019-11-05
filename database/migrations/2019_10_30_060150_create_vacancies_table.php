<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('vacancy_name');
            $table->tinyInteger('needle_number');
            $table->mediumText('education_requirement');
            $table->mediumText('skill_requirement');
            $table->mediumText('company_address');
            $table->string('company_mail_address');
            $table->mediumText('all_opportunities');
            $table->string('salary_range');
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
        Schema::dropIfExists('vacancies');
    }
}
