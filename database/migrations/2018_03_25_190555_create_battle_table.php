<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_team')->nullable();
            $table->string('first_team_votes')->nullable();
            $table->string('first_team_img')->nullable();

            $table->string('second_team')->nullable();
            $table->string('second_team_votes')->nullable();
            $table->string('second_team_img')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battle');
    }
}
