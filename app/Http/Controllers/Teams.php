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
    $team = Team::create($input);
    Members::create(array('user_id'=>\Auth::user()->id,'team_id'=>$team->id));
    return redirect()->route('play.joingame',$team->game_id);
  }
  public function update(Request $request, $id){
    $team = Team::findOrFail($id);
    $input = Request::all();
    $team->update($input);
    return redirect()->back();
  }
  public function delete($id)
  {
    $team = Teams::findOrFail($id);
    $team->delete();
    return redirect()->route('play.joingame',$team->game_id);
  }
}
