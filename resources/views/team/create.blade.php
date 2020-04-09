<div class='col-md-6 col-md-offset-3'>
<h3>Join with New Team</h3>
<hr>

  {{ Form::model($game->teams, ['route' => ['teams.create']])}}
  {!! Form::hidden('game_id', $game->id); !!}
   @include('team.form', ['submitButtonText' => 'Join'])
  {!! Form::close() !!}
 </div>
