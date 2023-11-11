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
        Schema::table('employees', function (Blueprint $table) {
            Schema::table('employees', function (Blueprint $table) {
                $table->tinyInteger('bank_type')->nullable(); // You can change the data type as needed
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            Schema::table('employees', function (Blueprint $table) {
                $table->dropColumn('bank_type');
            });
        });
    }
};
