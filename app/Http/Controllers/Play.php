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
        if (!\Auth::check()) {
          return redirect()->route('login');
        }
        $game = Game::findOrFail($id);
        $team_id = DB::table('teams')->join('members', 'members.team_id', '=', 'teams.id')->where('game_id',$game->id)->where('user_id',\Auth::user()->id)->first();
        if ($team_id){
          $team = Team::Where("id",$team_id->id)->Where("game_id",$game->id)->first();
        }
        return view('play.show',compact('game','team'));
      }

      public function round($gameid,$roundid){
        $game = Game::findOrFail($gameid);
        $round = Round::findOrFail($roundid);
        $team_id = DB::table('teams')->join('members', 'members.team_id', '=', 'teams.id')->where('game_id',$game->id)->where('user_id',\Auth::user()->id)->first();
        $team = Team::findOrFail($team_id->id);
        $questions = DB::table('questions')
          ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
          ->where('round_id',$round->id)
          ->select('questions.*','answers.answer as teamAnswer','answers.id as teamAnswerId')
          ->orderby('id','asc')
          ->get();
        return view('play.play',compact('game','round','questions','team'));
      }
}
