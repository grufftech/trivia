<?php

namespace App\Http\Controllers;

use App\Jeopardy;
use App\Game;
use App\Round;
use App\Question;
use Auth0User;
use Request;
use Form;

class Games extends Controller
{
    /*
    Route::get('/games/', 'Games@index')->name('games.create');
    Route::post('/games/', 'Games@create')->name('games.create');
    Route::post('/games/{id}', 'Games@edit')->name('games.edit');
    Route::delete('/games/{id}', 'Games@delete')->name('games.delete');*/

    public function show($id)
    {
      $game = Game::findOrFail($id);
      $rounds = Round::where('game_id',$id)->with('questions')->get();
      $round_count = Round::where('game_id',$id)->count()+1;
      $jeopardy = Jeopardy::inRandomOrder()->first();
      return view('game.show',compact('game','rounds','round_count','jeopardy'));
    }
    public function edit($id)
    {
      $game = Game::findOrFail($id);
      return view('game.edit',compact('game'));
    }
    public function create(Request $request)
    {
      $input = Request::all();
      Game::create($input);
      return redirect()->route('admin.index');
    }
    public function update(Request $request, $id)
    {
      $game = Game::findOrFail($id);
      $input = Request::all();
      $game->update($input);
      return redirect()->route('admin.index');
    }
    public function delete($id)
    {
      $game = Game::findOrFail($id);
      $game->delete();
      return redirect()->route('admin.index');
    }


}
