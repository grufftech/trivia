<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamScoreModifier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adding a team modifer
        Schema::table('teams', function (Blueprint $table) {
            $table->tinyInteger('credit_modifier')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // adding a team modifer
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('credit_modifier');
        });
    }
}
