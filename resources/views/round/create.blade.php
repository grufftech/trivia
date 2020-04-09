<div class='col-md-6 col-md-offset-3'>
  <h3>Add New Round</h3>
<hr>

  {{ Form::model($rounds, ['route' => ['rounds.create']])}}
   @include('round.form', ['submitButtonText' => 'Add Round'])
  {!! Form::close() !!}
 </div>
