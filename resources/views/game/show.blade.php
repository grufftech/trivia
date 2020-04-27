
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">{{$game->name}}</h2>
                         <h5>Game Settings</h5>
                          {!! Form::model($game, ['method' => 'POST', 'action' => ['Games@update',$game->id]]) !!}
                          <div class='form'>
                           {!! Form::label('name', 'Name:') !!}
                           {!! Form::text('name', $game->name, ['class' => 'form-control']) !!}
                           {!! Form::label('streamurl', 'Join URL:') !!}
                           {!! Form::text('streamurl', $game->streamurl, ['class' => 'form-control']) !!}
                           <h5>Game Settings</h5>
                           {!! Form::select('show_questions', array(0=>"FALSE",1=>"TRUE"), [($game->show_questions),'class' => 'form-control form-group custom-select']) !!}
                           {!! Form::label('show_questions', 'Show Questions on Form') !!}
                           {!! Form::submit("Save", ['class' => 'btn btn-lg btn-primary form-control']) !!}
                          </div>

                          {!! Form::close() !!}
                      </div>
                  </div>
                          @forelse($rounds as $round)

                          <div class="card border-light px-4 py-5">
                            <div class="card-header bg-white pb-0">
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
                            </div>
                        </div>

                         @empty
                          <p>There are no rounds to display!</p>
                         @endforelse




             <div class="card border-light px-4 py-5">
                 <div class="card-header bg-white pb-0">
            @include('round.create')
         </div>
     </div>
     <a href={{$url = action('Admin@index')}}>go back</a>
    </div>
  </div>
</div>



@endsection
