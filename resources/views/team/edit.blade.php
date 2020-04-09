<div class='col-md-6 col-md-offset-3'>
<h1>Edit Team</h1>
<hr>

  {!! Form::model($team, ['method' => 'POST', 'action' => ['Teams@update',$team->id]]) !!}
   @include('team.form', ['submitButtonText' => 'Save'])
  {!! Form::close() !!}
 </div>
