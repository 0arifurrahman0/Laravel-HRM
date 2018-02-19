<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('employee_type_id');
            $table->unsignedInteger('employee_department_id');
            $table->unsignedInteger('employee_designation_id');
            $table->unsignedInteger('employee_working_shift_id');
            $table->unsignedInteger('employee_pay_scale_id');
            $table->string('name');
            $table->string('father_name', 100);
            $table->string('mother_name', 100);
            $table->string('phone', 20);
            $table->string('email', 50);
            $table->date('birthday');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('nid')->nullable();
            $table->string('blood_group', 20)->nullable();
            $table->text('present_addres');
            $table->text('permanent_addres');
            $table->string('avatar')->default('default.png');
            $table->string('signature')->nullable();
            $table->string('cv')->nullable();
            $table->date('join');
            $table->text('education');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
