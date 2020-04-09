
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">{{$round->game->name}}</h2>
                         <h3 class="h2 mb-3">{{ $round->name }}</h3>



                         @forelse($questions as $question)
                         <h5>{{ $question->question}}</h5>
                         <table class="table table-sm">
                             <thead>
                                 <tr>
                                     <th scope="col">Team</th>
                                     <th scope="col">Answer</th>
                                     <th scope="col">Credit</th>
                                     <th scope="col">Actions</th>
                                 </tr>
                             </thead>
                             <tbody>

                             @forelse($question->answers as $answer)
                                <tr>
                                    <td scope="col">{{$answer->team->name}}</td>
                                    <td scope="col">{{$answer->answer}}</td>
                                    <td scope="col">{{$answer->credit}}</td>
                                    <td scope="col">
                                      {{Form::open(array('route' => array('admin.grade', $answer->id),'class' => 'form-inline'))}}

                                      <div class="form-group">
                                      {!! Form::hidden('credit', 1, ['class' => 'form-control']) !!}
                                      {!! Form::submit('1', ['class' => 'btn btn-sm btn-primary']) !!}
                                      {!! Form::close() !!}
                                      {{Form::open(array('route' => array('admin.grade', $answer->id)))}}
                                      {!! Form::hidden('credit', 0.5, ['class' => 'form-control']) !!}
                                      {!! Form::submit('0.5', ['class' => 'btn btn-sm btn-primary']) !!}
                                      {!! Form::close() !!}
                                      {{Form::open(array('route' => array('admin.grade', $answer->id)))}}
                                      {!! Form::hidden('credit', 0, ['class' => 'form-control']) !!}
                                      {!! Form::submit('0', ['class' => 'btn btn-sm btn-primary']) !!}
                                      {!! Form::close() !!}
                                      </div>
                                    </td>
                                </tr>


                             @empty
                             <p>There are no answers in this question!</p>
                             @endforelse


                            </tbody>
                        </table>
                         @empty
                         <p>There are no questions in this round!</p>
                         @endforelse

                     </div>

                     <a href={{$url = action('Admin@index')}}>go back</a>


             </div>
         </div>
     </div>
  </div>
</div>



@endsection
