<div class='col-md-6 col-md-offset-3'>
  <h1>Edit Question</h1>
<hr>

  {!! Form::model($question, ['method' => 'POST', 'action' => ['Question@update',$question->id]]) !!}
   @include('question.form', ['submitButtonText' => 'Save'])
  {!! Form::close() !!}
 </div>
