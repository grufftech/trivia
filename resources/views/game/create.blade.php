 <div class="container">
  <h4 class="h4 mb-3">Create New Game</h4>
 <div class="row">
     <div class="col-12">
                 {{ Form::model($games, ['route' => ['games.create']])}}
                  @include('game.form', ['submitButtonText' => 'Add Game'])
                 {!! Form::close() !!}
      </div>
     </div>
 </div>
