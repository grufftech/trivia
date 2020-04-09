
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">{{$game->name}}</h2>
                          @forelse($rounds as $round)
                            <h4>
                            {{ $round->name }}
                            <a href="{{ route('rounds.edit', $round->id) }}"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('rounds.delete', $round->id) }}"><i class="fas fa-trash"></i></a>
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

                         @empty
                          <p>There are no rounds to display!</p>
                         @endforelse

                         @include('round.create')

             </div>
         </div>
     </div>
  </div>
</div>



@endsection
