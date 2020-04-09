<div class='form-group'>
{!! Form::text('name', (isset($team->name) ? $team->name : "" ), ['class' => 'form-control','placeholder'=>'team name']) !!}
{!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-primary form-control']) !!}
</div>
<div class='form-group'>
</div>
