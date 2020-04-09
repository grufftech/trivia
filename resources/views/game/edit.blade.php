<div class='col-md-6 col-md-offset-3'>
  <h1>Edit Candidate</h1>
<hr>

  {!! Form::model($game, ['method' => 'POST', 'action' => ['Games@update',$game->id]]) !!}
   @include('game.form', ['submitButtonText' => 'Save'])
  {!! Form::close() !!}
 </div>
