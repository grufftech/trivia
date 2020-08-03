 @extends('templates.mainlayout')
 @section('content')

<div class="section section-lg">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card border-light px-4 py-5">
          <div class="card-header bg-white pb-0">
            <h1>Edit Team</h1>
            {!! Form::model($team, ['method' => 'POST', 'action' => ['Teams@update',$team->id]]) !!}

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', (isset($team->name) ? $team->name : "" ), ['class' => 'form-control','placeholder'=>'team name']) !!}

            {!! Form::label('credit_modifier', 'Credit Modifier:') !!}
            {!! Form::input('number', 'credit_modifier', $team->credit_modifier, ['class' => 'form-control']) !!}

            {!! Form::submit("Save Team", ['class' => 'btn btn-lg btn-primary form-control']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      <a href={{$url = action('Admin@index')}}>go back</a>
    </div>
  </div>
</div>
 @endsection
