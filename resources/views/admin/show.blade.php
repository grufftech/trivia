
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">{{$game->name}}</h2>

                          <h3>Registered Teams</h3>
                          <ol>
                          @forelse($game->teams as $team)
                          <li>{{ $team->name }} <a href={{$url = action('Teams@edit',[$team->id])}}><i class="fas fa-edit"></i></a> </li>

                           @empty
                            <p>There are no teams to display!</p>
                           @endforelse
                         </ol>




                         @forelse($game->rounds as $round)
                         <div>
                           <h2>{{ $round->name }}</h2>
                             @forelse($round->questions as $question)
                               <p><small class="text-muted">Question {{$loop->iteration}}:</small> {{ $question->question}}</p>
                             @empty
                             <p>There are no questions to display!</p>
                             @endforelse

                             <a class="btn btn-primary" href=/admin/grade-round/{{$round->id}}>Close & Grade Round</a>
                             <hr>

                         </div>
                         @empty
                         <p>There are no rounds to display!</p>
                         @endforelse

                     </div>
                      <a href={{$url = action('Admin@index')}}>go back</a>

             </div>
         </div>
     </div>
  </div>
</div>



@endsection
