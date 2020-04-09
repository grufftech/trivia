@extends('templates.mainlayout')

 @section('title','Admin Panel')

 @section('content')

 <a href={{$url = action('Games@index')}}>go back</a>
 <h1>{{$game->name}}</h1>

<div class='body'>
  @forelse($rounds as $round)
  <div>
    <h4>
    {{ $round->name }}
    [<a href="{{ route('rounds.edit', $round->id) }}">Edit</a>]
    [<a href="{{ route('rounds.delete', $round->id) }}">Delete</a>]
    </h4>
    <ol>
    @foreach($round->questions as $question)
    <li>{{ $question->question}} ( {{ $question->answer}})
    [<a href="{{ route('questions.edit', $question->id) }}">Edit</a>]
    [<a href="{{ route('questions.delete', $question->id) }}">Delete</a>]
    </li>
    @endforeach
    </ol>
    @include('question.create')

  </div>
 @empty
  <p>There are no rounds to display!</p>
 @endforelse
</div>

 @include('round.create')

 @endsection
