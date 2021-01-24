<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Таблиця типів\видів доходу  */
        Schema::create('income_base', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('icon')->nullable(false);
            $table->float('total')->nullable(false);
            $table->string('currency')->nullable(false);

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });

        /*Логування усіх доходів*/
        Schema::create('income_log', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('income_base_id')->nullable(false);

            $table->float('sum')->nullable(false);
            $table->timestamps();

            $table->foreign('income_base_id')->references('id') -> on('income_base');

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_base');
        Schema::dropIfExists('income_log');
    }
}
