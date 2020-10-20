
@extends('templates.mainlayout')
@section('content')

 <div class="section section-lg">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card border-light px-4 py-5">
                     <div class="card-header bg-white pb-0">
                         <h2 class="h3 mb-3">Users</h2>


                         <table class="table">
                         
                         <thead>
                             <tr>
                                 <th scope="col">Email</th>
                                 <th scope="col">Created At</th>
                             </tr>
                         </thead>
                         <tbody>
                           
                          @forelse($users as $user)
                           <tr>
                             <td>{{ $user->email }}</td>
                             <td>{{ $user->created_at }}</td>
                           </tr>
                           @empty
                          <p>There are no users to display!</p>
                           @endforelse
                           </tbody>
                           </table>
                     </div>
                     <hr>
             </div>
         </div>
     </div>
  </div>
</div>



@endsection
