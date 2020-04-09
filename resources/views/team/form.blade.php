<div class='form-group'>
{!! Form::text('name', (isset($team->name) ? $team->name : "" ), ['class' => 'form-control']) !!}
{!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>
<div class='form-group'>
</div>
