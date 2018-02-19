<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalaryRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['earning', 'deduction']);
            $table->enum('amount_type', ['percent', 'fixed']);
            $table->decimal('amount', 8, 2);
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
        Schema::dropIfExists('employee_salary_rules');
    }
}
