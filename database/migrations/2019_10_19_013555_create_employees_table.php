<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('salary');
            $table->string('place');
            $table->string('previous_place')->nullable();
            $table->string('got_current_month_salary')->nullable();
            $table->string('last_salary_pay_month')->nullable();
            $table->string('last_salary_pay_date')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->mediumText('qualification')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('employee_id');
            $table->string('email');
            $table->string('phone');
            $table->string('photo');
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
