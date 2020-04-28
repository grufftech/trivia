 @extends('templates.mainlayout')
 @section('content')

<div class="section section-lg">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card border-light px-4 py-5">
          <div class="card-header bg-white pb-0">
            <h1>Edit Round</h1>
            {!! Form::model($round, ['method' => 'POST', 'action' => ['Rounds@update',$round->id]]) !!}
            <div class='form-group'>
             {!! Form::label('name', 'Name:') !!}
             {!! Form::text('name', $round->name, ['class' => 'form-control']) !!}
            </div>
            <div class='form-group'>
             {!! Form::submit("Save", ['class' => 'btn btn-sm btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
      <a href={{$url = action('Admin@index')}}>go back</a>
    </div>
  </div>
</div>
 @endsection
