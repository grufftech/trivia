
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">Games</h2>
                          @forelse($games as $game)
                         <p><a class="btn btn-primary" href="{{ url('/admin', $game->id) }}">{{ $game->name }}</a></p>
                          @empty
                          <p>There are no games to display!</p>
                          @endforelse
                     </div>
                     <hr>
                     @include('game.create')
             </div>
         </div>
     </div>
  </div>
</div>



@endsection
