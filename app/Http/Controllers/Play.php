<?php

namespace App\Http\Controllers;

use App\Jeopardy;
use App\Game;
use App\Round;
use App\Question;
use App\Team;
use App\Members;
use App\Answer;
use Auth0User;
use DB;
use Request;
use Form;

class Play extends Controller
{
      public function index(){
        $games = Game::all();
        return view('play.index',compact('games'));
      }

      public function game($id){
        $userId = \Auth::user()->id;
        $game = Game::findOrFail($id);
        $team = Team::where('user_id',$userId)->where('game_id',$id)->first();
        if (!$team){
          return view('play.jointeam',compact('game'));
        }
        return view('play.show',compact('game','team'));
      }

      public function round($gameid,$roundid){
        $userId = \Auth::user()->id;
        $game = Game::findOrFail($gameid);
        $round = Round::findOrFail($roundid);

        $team = Team::where('user_id',$userId)->where('game_id',$gameid)->first();
        $questions = DB::table('questions')
          ->leftJoin('answers', function ($join) use ($team) {
            $join->on('questions.id','=','answers.question_id')
              ->where('answers.team_id','=', $team->id);
          })
          ->where('round_id',$round->id)
          ->select('questions.*','answers.answer as teamAnswer','answers.id as teamAnswerId')
          ->get();
        return view('play.play',compact('game','round','questions','team'));
      }
}
