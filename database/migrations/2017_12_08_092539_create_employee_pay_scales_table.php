<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePayScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_pay_scales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('amount', 8, 2);
            $table->string('house_rent')->default(0);
            $table->string('medical')->default(0);
            $table->string('transport')->default(0);
            $table->string('phone')->default(0);
            $table->string('conveyance')->default(0);
            $table->string('lunch')->default(0);
            $table->string('bonus')->default(0);
            $table->string('company_provident')->default(0);
            $table->string('earning_other')->default(0);
            $table->string('provident')->default(0);
            $table->string('tax')->default(0);
            $table->string('deduction_other')->default(0);
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
        Schema::dropIfExists('employee_pay_scales');
    }
}
