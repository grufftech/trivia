@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5 text-center">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3"><i class="fas fa-hot-tub mr-2"></i> {{$game->name}}</h2>

                     </div>
                     <div class="card-body pt-2 px-0 px-lg-7">
                       @if (isset($team))
                      <h3>Team: {{$team->name}}</h3>
                       <div class="row">
                         @forelse($game->rounds as $round)
                             <div class="col-12 mt-2">

                               {{ Form::open(array('url' => '/play/'.$game->id.'/round/'.$round->id,'method' => 'get')) }}
                                   <button type="submit" class="btn btn-primary rounded-right" {!! ($round->accepting_answers==FALSE? 'disabled' : '') !!} >{{ $round->name }}</button>
                               {!! Form::close() !!}
                             </div>
                         @empty
                         @endforelse
                       @else
                       @include('team.create')
                       @endif
                     </div>
                 </div>
                  <a href={{$url = action('Play@index')}}>go back</a>
             </div>
         </div>
     </div>
  </div>
</div>




@endsection
