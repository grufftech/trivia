<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('games', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('streamurl')->nullable();
          $table->boolean('show_questions')->default(false);
          $table->timestamps();
      });
      Schema::create('teams', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('game_id')->unsigned()->index();
          $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
          $table->bigInteger('user_id')->unsigned()->index()->default(0);
          $table->string('name');
          $table->timestamps();
      });
      Schema::create('rounds', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('game_id')->unsigned()->index();
          $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
          $table->string('name');
          $table->boolean('accepting_answers')->default(true);
          $table->timestamps();
      });
      Schema::create('questions', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('round_id')->unsigned()->index();
          $table->foreign('round_id')->references('id')->on('rounds')->onDelete('cascade');
          $table->longText('question');
          $table->longText('answer')->nullable();
          $table->timestamps();
      });
      Schema::create('answers', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('question_id')->unsigned()->index();
          $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
          $table->bigInteger('team_id')->unsigned()->index();
          $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
          $table->longText('answer');
          $table->double('credit')->default(0);
          $table->timestamps();
      });
        Schema::create('Jeopardy', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->longText('answer');
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
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('rounds');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('games');

    }
}
