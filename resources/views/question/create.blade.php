
<div class='form-inline'>
{{ Form::model($round->questions, ['route' => ['questions.create']])}}
{!! Form::text('question', '', ['placeholder'=>'question','class' => 'form-control','required']) !!}
{!! Form::text('answer','' , ['placeholder'=>'answer','class' => 'form-control','required']) !!}
{!! Form::hidden('round_id', $round->id); !!}
{!! Form::submit('New Question', ['class' => 'btn btn-sm btn-primary form-control']) !!}
{!! Form::close() !!}
</div>
