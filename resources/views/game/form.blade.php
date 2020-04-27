<div class='form'>
 {!! Form::label('name', 'Name:') !!}
 {!! Form::text('name', '', ['class' => 'form-control']) !!}
 {!! Form::label('streamurl', 'Join URL:') !!}
 {!! Form::text('streamurl', '', ['class' => 'form-control']) !!}
 <h5>Game Settings</h5>
 {!! Form::select('show_questions', array(0=>"FALSE",1=>"TRUE"), ['class' => 'form-control form-group custom-select']) !!}
 {!! Form::label('show_questions', 'Show Questions on Form') !!}
 {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-primary form-control']) !!}
</div>
