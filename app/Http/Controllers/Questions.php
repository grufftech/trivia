<?php

namespace App\Http\Controllers;

use App\Question;
use Request;
use Form;
use Auth0User;

class Questions extends Controller
{
  public function show($id)
  {
    $question = Question::findOrFail($id);
    return view('question.show',compact('question'));
  }
  public function edit($id)
  {
    $question = Question::findOrFail($id);
    return view('question.edit',compact('question'));
  }
  public function create(Request $request)
  {
    $input = Request::all();
    $question = Question::create($input);
    echo "saved ".$question->question;
  }
  public function update(Request $request, $id)
  {
    $question = Question::findOrFail($id);
    $input = Request::all();
    $question->update($input);
    return redirect()->route('games.show',$question->round->game_id);
  }
  public function delete($id)
  {
    $question = Question::findOrFail($id);
    $question->delete();
    return redirect()->route('games.show',$question->round->game_id);
  }
}
