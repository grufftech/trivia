
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                          <h4>Edit Question</h4>
                           {!! Form::model($question, ['method' => 'POST', 'action' => ['Questions@update',$question->id]]) !!}
                           <div class='form-inline'>
                           {!! Form::text('question',$question->question, ['placeholder'=>'question','class' => 'form-control', 'required']) !!}
                           {!! Form::text('answer',$question->answer , ['placeholder'=>'answer','class' => 'form-control','required']) !!}
                           {!! Form::submit("Save", ['class' => 'btn btn-lg btn-success form-control']) !!}
                           </div>
                           <div class='form-group'>
                           </div>

                           {!! Form::close() !!}
                          </div>


                     </div>
                      <a href={{$url = action('Admin@index')}}>go back</a>

             </div>
         </div>
     </div>
  </div>
</div>



@endsection
