

 @extends('templates.mainlayout')

 @section('title','Admin Panel')

 @section('content')
 <h1>Games</h1>

<div class='body'>
  @forelse($games as $game)
  <div>
    <a href="{{ url('/games', $game->id) }}">{{ $game->name }}</a>[<a href="{{ route('games.edit', $game->id) }}">Edit</a>][<a href="{{ route('games.delete', $game->id) }}">Delete</a>]
  </div>

  @empty
    <p>There are no games to display!</p>
  @endforelse
</div>

@include('game.create')
 @endsection
