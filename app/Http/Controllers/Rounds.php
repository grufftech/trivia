<?php

namespace App\Http\Controllers;

use App\Round;
use Request;
use Form;
use Auth0User;

class Rounds extends Controller
{
  public function edit($id)
  {
    $round = Round::findOrFail($id);
    return view('round.edit',compact('round'));
  }
  public function create(Request $request)
  {
    $input = Request::all();
    $round = Round::create($input);
    return redirect()->route('games.show',$round->game_id);
  }
  public function update(Request $request, $id)
  {
    $round = Round::findOrFail($id);
    $input = Request::all();
    $round->update($input);
    return redirect()->route('games.show',$round->game_id);
  }
  public function unlock($id)
  {
    $round = Round::findOrFail($id);
    $round->accepting_answers = true;
    $round->save();
    return redirect()->route('games.show',$round->game_id);
  }
  public function delete($id)
  {
    $round = Round::findOrFail($id);
    $round->delete();
    return redirect()->route('games.show',$round->game_id);
  }
}
