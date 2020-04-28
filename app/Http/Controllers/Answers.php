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
      if (strcasecmp($ans->answer, $question->answer)){
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
}
