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

                       @foreach ($questions as $q)
                            {{Form::open(array('route' => 'answers.create', 'target'=>'my_iframe','id' => 'formAnswers'.$loop->iteration))}}
                            <div class="form-group">
                                 {!! Form::label('answer', 'Question '.$loop->iteration.':'.($game->show_questions? $q->question:"")) !!}
                                 @if ($round->accepting_answers == FALSE)
                                  {!! Form::text('answer', $q->teamAnswer, ['class' => 'form-control','id' => 'answer'.$loop->iteration, 'disabled'=>'true']) !!}
                                 @else
                                  {!! Form::text('answer', $q->teamAnswer, ['autocomplete'=>'off','class' => 'form-control','id' => 'answer'.$loop->iteration]) !!}
                                 @endif
                                 {!! Form::hidden('question_id', $q->id, ['class' => 'form-control']) !!}
                                 {!! Form::hidden('team_id', $team->id, ['class' => 'form-control']) !!}
                             </div>

                             {!! Form::submit('Save', ['class' => 'btn btn-primary form-control invisible']) !!}
                         </form>
                       @endforeach
                      <a class="btn btn-primary" onclick="return confirm('Submit Round?')"  href={{route('play.joingame',$game->id)}}>Submit Round</a>
                 </div>
                  <iframe name="my_iframe" src="" style="width: 100%; height:1500px; display:all;"></iframe>
             </div>
         </div>
     </div>
  </div>
</div>




@endsection
