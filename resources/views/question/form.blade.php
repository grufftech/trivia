<div class='form-inline'>
{!! Form::text('question', '', ['placeholder'=>'question','class' => 'form-control']) !!}
{!! Form::text('answer','' , ['placeholder'=>'answer','class' => 'form-control']) !!}
{!! Form::hidden('round_id', $round->id); !!}
{!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>
<div class='form-group'>
</div>
