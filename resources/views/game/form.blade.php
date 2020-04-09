<div class='form-inline'>
 {!! Form::label('name', 'Name:') !!}
 {!! Form::text('name', null, ['class' => 'form-control']) !!}
 {!! Form::label('streamurl', 'streamurl:') !!}
 {!! Form::text('streamurl', 'none', ['class' => 'form-control']) !!}
 {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-primary form-control']) !!}
</div>
