{{ Form::model($round->questions, ['route' => ['questions.create']])}}
@include('question.form', ['submitButtonText' => 'Add Question'])
{!! Form::close() !!}
