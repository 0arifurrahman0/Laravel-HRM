<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWorkingShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_working_shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('check_in', 20);
            $table->string('check_out', 20);
            $table->string('working_days');
            $table->text('description')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->integer('update_by')->nullable();
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
        Schema::dropIfExists('employee_working_shifts');
    }
}
