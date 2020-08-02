<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use App\Round;
use App\Question;
use App\Answer;

use Auth0User;
use DB;
use Request;
use Form;

class Admin extends Controller
{
    public function dump()
    {
      $isLoggedIn = \Auth::check();
      dd(\Auth::user());
    }
    public function index(){
      $games = Game::all();
      $teams = Team::all();
      $rounds = Round::all();

      return view('admin.index',compact('games'));
    }
    public function showGameAdmin($id){
      $game = Game::findOrFail($id);
      $scores = DB::select('SELECT
          	sum(answers.credit) as points,
          	teams.name,
            max(teams.id) as id,
	          count(questions.id) as question_count
          FROM answers
          JOIN questions ON answers.question_id = questions.id
          JOIN rounds on questions.round_id = rounds.id
          JOIN teams ON answers.team_id = teams.id
          JOIN games on rounds.game_id = games.id
          WHERE games.id = '.$id.'
          group by teams.name
          order by points desc');
      return view('admin.show',compact('game','scores'));
    }
    public function showGradeRoundAdmin($id){
        $round = Round::with('questions')->findOrFail($id);
        $round->accepting_answers = false;
        $round->save();
        $round->load('questions','game');
        $questions = Question::with('answers')->where('round_id',$round->id)->get();
        return view('admin.showround',compact('round','questions'));
    }
    public function unlockRound($id){
        $round = Round::findOrFail($id);
        $round->accepting_answers = true;
        $round->save();
        return redirect()->back();
    }

    public function view($id){
      $answer = Answer::findOrFail($id);
      echo $answer->credit;
    }
    public function grade(Request $request, $id)
    {
      $answer = Answer::findOrFail($id);
      $input = Request::all();
      $answer->update($input);
      echo $answer->credit;
    }
}
