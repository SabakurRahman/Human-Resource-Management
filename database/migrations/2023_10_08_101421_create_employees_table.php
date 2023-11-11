<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('reporting_boss_id')->nullable();
            $table->string('designation')->nullable();
            $table->date('joining_date')->nullable();
            $table->tinyInteger('job_type')->nullable();
            $table->tinyInteger('job_status')->nullable();
            $table->tinyInteger('salary_type')->nullable();
            $table->float('basic_total')->nullable();
            $table->float('house_rent')->nullable();
            $table->float('medical')->nullable();
            $table->float('gross_total')->nullable();
            $table->string('employee_id')->unique()->nullable();
            $table->string('father_name')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('local_address')->nullable();
            $table->string('nationality')->nullable();
            $table->tinyInteger('marital_status')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('routing_number')->nullable();
            $table->date('dob')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
