<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_group_id');
            $table->string('accounts_no')->unique();
            $table->string('name');
            $table->string('father')->nullable();
            $table->string('husband')->nullable();
            $table->string('phone', 20);
            $table->string('addres');
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
        Schema::dropIfExists('customers');
    }
}
