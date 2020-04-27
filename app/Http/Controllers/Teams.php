<?php

namespace App\Http\Controllers;

use App\Team;
use App\Members;
use Request;
use Form;
use Auth;
use Auth0User;

class Teams extends Controller
{
  public function edit($id)
  {
    $team = Team::findOrFail($id);
    return view('team.edit',compact('team'));
  }
  public function create(Request $request)
  {
    $input = Request::all();
    $userId = \Auth::user()->id;
    $team = new Team;
    $team->game_id = $input['game_id'];
    $team->name = $input['name'];
    $team->user_id = $userId;
    $team->save();
    return redirect()->route('play.joingame',$team->game_id);
  }
  public function update(Request $request, $id){
    $team = Team::findOrFail($id);
    $input = Request::all();
    $team->update($input);
    return redirect()->route('admin.show',$team->game_id);
  }
  public function delete($id)
  {
    $team = Teams::findOrFail($id);
    $team->delete();
    return redirect()->route('admin.show',$team->game_id);
  }
}
