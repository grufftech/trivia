@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3"><i class="fas fa-hot-tub mr-2"></i> {{$game->name}}</h2>
                         <h3>Team: {{$team->name}} -- {{$round->name}}</h3>
                     </div>

                     {!! ($round->accepting_answers==FALSE? "<div class='alert alert-danger'>Round is no longer accepting answers</div>":"") !!}
                     {!! (\Session::has('success')? "<div class='alert alert-success'>".\Session::get('success')."</div>":"") !!}

                      {{Form::open(array('route' => 'answers.submitall'))}}
                      {!! Form::hidden('team_id', $team->id, ['class' => 'form-control']) !!}
                      {!! Form::hidden('round_id', $round->id, ['class' => 'form-control']) !!}
                       @foreach ($questions as $q)
                            <div class="form-group">
                                 <h1>{!! Form::label('answer', 'Question '.$loop->iteration.':'.($game->show_questions? $q->question:"")) !!}</h1>

                                 @if ($round->accepting_answers == FALSE)
                                  {!! Form::text('answer['.$q->id.']', $q->teamAnswer, ['class' => 'form-control', 'disabled'=>'true']) !!}
                                 @else
                                  {!! Form::text('answer['.$q->id.']', $q->teamAnswer, ['autocomplete'=>'off','class' => 'form-control']) !!}
                                 @endif
                             </div>

                        @endforeach
                        <hr>
                        
                        @if ($round->accepting_answers == FALSE)
                            <a href={{route('play.joingame',$game->id)}}>go back</a>
                        @else
                            {!! Form::submit('Submit Round', ['class' => 'btn btn-primary form-control']) !!}
                        @endif
                        </form>
                    </div>
             </div>
         </div>
     </div>
  </div>
</div>




@endsection
