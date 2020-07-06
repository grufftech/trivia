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
use Request;
use Form;
use Str;

class Answers extends Controller
{
  public function edit($id)
  {
    $answer = Answer::findOrFail($id);
    return view('round.edit',compact('round'));
  }
  public function create(Request $request)
  {
    $input = Request::all();
    $question = Question::find($input['question_id']);
    $round = $question->round;
    $game = $round->game;
    if ($round->accepting_answers == false){
      abort(403, 'Sorry! '.$round->name.' is no longer accepting answers.');
    }else{
      Answer::where('team_id',$input['team_id'])->where('question_id',$question->id)->delete();
      $ans = Answer::create($input);
      if (Str::contains(strtolower($ans->answer), strtolower($question->answer))){
        $ans->credit = 1;
        $ans->save();
      }

      echo "saved ".$ans->answer;
    }
  }
  public function update(Request $request, $id)
  {
    $answer = Answer::findOrFail($id);
    $input = Request::all();

    $question = Question::find($input['question_id']);
    $round = $question->round;
    $game = $round->game;

    if ($round->accepting_answers == false){
      abort(403, 'Sorry! '.$round->name.' is no longer accepting answers.');
    }else{
      $answer->update($input);
      return redirect()->back();
    }
  }
  public function delete($id)
  {
    $answer = Answer::findOrFail($id);
    $answer->delete();
    return redirect()->route('games.show',$answer->game_id);
  }
  
  public function submitAll(Request $request)
  {
    $input = Request::all();
    
    
    // lets gather some information. 
    $team = Team::findOrFail($input['team_id']);
    $round = Round::findOrFail($input['round_id']);
    $game = $round->game;

    foreach($input['answer'] as $question_id=>$answer){
      
      // let's grab the question to start.
      $question = Question::find($question_id);

      // this replaces empty answers with an a string that represents an empty answer, to make tracking easier. 
      if ($answer === NULL){$answer = "---EMPTY---";}
      
      // if the round is no longer accepting answers, you're gonna have a bad time. 
      if ($round->accepting_answers == false){
        abort(403, 'Sorry! '.$round->name.' is no longer accepting answers.');
      }

      // if there is an answer from this team & for this question, delete it. 
      Answer::where('team_id',$team->id)->where('question_id',$question->id)->delete();
      
      // create a new answer with the form.
      $ans = new Answer;
      $ans->answer = $answer;
      $ans->team_id = $team->id;
      $ans->question_id = $question->id; 
      if (Str::contains(strtolower($ans->answer), strtolower($question->answer))){
        $ans->credit = 1;
      }else{
        $ans->credit = 0;
      }
      $ans->save();
    }
    
    return redirect()->route('play.joingame',$game->id)->with('success', $round->name.' Saved, Good Luck!');   
  }
}