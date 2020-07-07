<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmojiSupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add emoji support
        DB::unprepared('ALTER TABLE `games` CONVERT TO CHARACTER SET utf8mb4');
        DB::unprepared('ALTER TABLE `teams` CONVERT TO CHARACTER SET utf8mb4');
        DB::unprepared('ALTER TABLE `rounds` CONVERT TO CHARACTER SET utf8mb4');
        DB::unprepared('ALTER TABLE `questions` CONVERT TO CHARACTER SET utf8mb4');
        DB::unprepared('ALTER TABLE `answers` CONVERT TO CHARACTER SET utf8mb4');
        DB::unprepared('ALTER TABLE `jeopardy` CONVERT TO CHARACTER SET utf8mb4');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // remove emoji support
        DB::unprepared('ALTER TABLE `games` CONVERT TO CHARACTER SET utf8');
        DB::unprepared('ALTER TABLE `teams` CONVERT TO CHARACTER SET utf8');
        DB::unprepared('ALTER TABLE `rounds` CONVERT TO CHARACTER SET utf8');
        DB::unprepared('ALTER TABLE `questions` CONVERT TO CHARACTER SET utf8');
        DB::unprepared('ALTER TABLE `answers` CONVERT TO CHARACTER SET utf8');
        DB::unprepared('ALTER TABLE `jeopardy` CONVERT TO CHARACTER SET utf8');

    }
}
