@extends('templates.mainlayout')
@section('content')
        <!-- Hero -->
        <section class="section section bg-primary pb-11 pb-lg-12 text-white overflow-hidden z-2">
            <div class="container z-2">
                <div class="row justify-content-center text-center pt-6 pb-3">
                    <div class="col-12 col-md-8">
                        <h1 class="display-1 font-weight-light mb-3">Online Trivia<span class="pixel-pro-badge font-weight-bolder text-primary">SOCIAL DISTANCED</span></h1>
                        @if (!\Auth::check())
                        <p>Please <a class="btn btn-primary" href={{ url('/login') }}>Login</a> to play Trivia!</p>
                        @else
                        <p class="lead px-xl-6 mb-5">Select your game from below.</p>
                        <div class="d-flex flex-column flex-wrap flex-md-row mb-5 justify-content-center align-items-center">
                          @forelse($games as $game)
                              <a href="{{ url('/play', $game->id) }}" class="btn btn-tertiary mb-3 mt-2 mr-2 mr-md-3 animate-up-2"><i class="fas fa-hot-tub mr-2"></i>{{ $game->name }}</a>
                          @empty
                            <p>Sorry, there are no active games right now.</p>
                          @endforelse
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
     </div>
   </div>
@endsection
