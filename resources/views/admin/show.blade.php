
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">{{$game->name}}</h2>

                         <h2><a class="btn btn-sm btn-primary" href={{$url = action('Games@show',[$game->id])}}><i class="fas fa-edit"></i> Edit Game, Rounds & Questions</a></h2>
                         <hr>
                          <h3>Teams & Scores</h3>
                          <div class="col-lg-12">
                          @forelse($scores as $team)
                              <div class="progress-wrapper">
                                  <div class="progress-info">
                                      <div class="progress-label">
                                          <span class="text-primary"><a href={{$url = action('Teams@edit',[$team->id])}}><i class="fas fa-edit"></i></a> {{ $team->name }}</span>
                                      </div>
                                      <div class="progress-percentage">
                                          <span>{{ $team->points}}</span>
                                      </div>
                                  </div>
                                  <div class="progress">
                                      <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{ $team->points}}" aria-valuemin="0" aria-valuemax="{{ $team->question_count}}" style="width: 50%; animation: 3s ease 0s 1 normal none running animate-positive; opacity: 1;"></div>
                                  </div>
                              </div>
                              @empty
                               <p>There are no teams to display!</p>
                              @endforelse
                          </div>

                          <hr>















                         @forelse($game->rounds as $round)
                         <div>
                           <h2>{{ $round->name }}</h2>
                             @forelse($round->questions as $question)
                               <p><small class="text-muted">Question {{$loop->iteration}}:</small> {{ $question->question}}</p>
                             @empty
                             <p>There are no questions to display!</p>
                             @endforelse

                             <a class="btn btn-primary"  onclick="return confirm('Are you sure you want to close this round?')"  href=/admin/grade-round/{{$round->id}}>Close & Grade Round</a>
                             <hr>

                         </div>
                         @empty
                         <p>There are no rounds to display!</p>
                         @endforelse
                         <div class="alert alert-danger" role="alert">
                                             <span class="alert-inner--text"><i class="fas fa-plane"></i> !!DANGER ZONE!!</span>
                                         </div>
                         <span class="alert-inner--text"></span>
                          <a class="btn btn-sm btn-primary"  onclick="return confirm('Are you sure you want to delete this?')" href={{$url = action('Games@delete',[$game->id])}}>Delete Trivia</a>
                     </div>

             </div>
             <a href={{$url = action('Admin@index')}}>go back</a>
         </div>
     </div>
  </div>
</div>



@endsection
