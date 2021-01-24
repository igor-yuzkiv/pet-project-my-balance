<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_base', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable(false);
            $table->string('icon')->nullable(false);
            $table->string('total')->nullable(false);
            $table->string('currency')->nullable(false);

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
        Schema::create('cost_log', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cost_base_id')->nullable(false);
            $table->unsignedBigInteger('income_base_id')->nullable(false);
            $table->float('sum')->nullable(false);

            $table->timestamps();

            $table->foreign('cost_base_id')->references('id') -> on('cost_base');
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
        Schema::dropIfExists('cost_base');
        Schema::dropIfExists('cost_log');
    }
}
