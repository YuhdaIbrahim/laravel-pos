<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name_role');
            $table->integer('all')->default(0)->nullable();
            $table->integer('home')->default(0)->nullable();
            $table->integer('products')->default(0)->nullable();
            $table->integer('orders')->default(0)->nullable();
            $table->integer('employees')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
