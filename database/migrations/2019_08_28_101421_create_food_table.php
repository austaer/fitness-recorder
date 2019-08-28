<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food', function (Blueprint $table) {
            //
            $table->char('food_code', 1);
            $table->string('food_seq', 6);
            $table->string('food_name', 100);
            $table->float('food_kcal');
            $table->index(['food_code', 'food_seq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            Schema::drop('food');
        });
    }
}
