@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5 text-center">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h1 mb-3"><i class="fas fa-hot-tub mr-2"></i> {{$game->name}}</h2>
                         @include('team.create')
                          <a href={{$url = action('Play@index')}}>go back</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
  </div>
</div>




@endsection
