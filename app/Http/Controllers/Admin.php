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
      return view('admin.show',compact('game'));
    }
    public function showGradeRoundAdmin($id){
        $round = Round::with('questions')->findOrFail($id);
        $round->accepting_answers = false;
        $round->save();
        $round->load('questions','game');
        $questions = Question::with('answers')->where('round_id',$round->id)->get();
        return view('admin.showround',compact('round','questions'));
    }

    public function grade(Request $request, $id)
    {
      $answer = Answer::findOrFail($id);
      $input = Request::all();
      $answer->update($input);
      return redirect()->back();
    }
}
