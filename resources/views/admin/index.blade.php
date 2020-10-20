
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">



                 <div class="card border-light px-4 py-5">




                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">Active Games</h2>
                          @forelse($games as $game)
                         <p><a class="btn btn-primary" href="{{ url('/admin', $game->id) }}">{{ $game->name }}</a></p>
                          @empty
                          <p>There are no games to display!</p>
                          @endforelse
                     </div>
                     
                     <div class="card-header bg-white pb-0">
                        <h2 class="h3 mb-3">Create New Game</h2>
                        <div class="row">
                            <div class="col-12">
                                {{ Form::model($games, ['route' => ['games.create']])}}
                                @include('game.form', ['submitButtonText' => 'Add Game'])
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>



                    <div class="card-header bg-white pb-0">
                         <h3 class="h3 mb-3">Registered Users</h3>
                          
                         <p><a class="btn btn-primary" href="/admin-user-index">Show Users</a></p>
                     </div>


                    
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3">Game Archive</h2>
                         <table class="table">
                         
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Join URL</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Archived At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($oldgames as $oldgame)
                          <tr>
                            <td>{{ $oldgame->name }}</td>
                            <td>{{ $oldgame->streamurl }}</td>
                            <td>{{ $oldgame->created_at }}</td>
                            <td>{{ $oldgame->deleted_at }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ url('/games/restore', $oldgame->id) }}">Restore</a></td>
                          </tr>
                          @empty
                          <p>There are no games to display!</p>
                          @endforelse
                          </tbody>
                          </table>
                     </div>
                </div>

             </div>
         </div>
     </div>
  </div>
</div>



@endsection
