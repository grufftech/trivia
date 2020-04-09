<div class='form-group'>
 {!! Form::label('name', 'Name:') !!}
 {!! Form::text('name', 'Round '.$round_count, ['class' => 'form-control']) !!}
 {!! Form::hidden('game_id', $game->id); !!}
</div>
<div class='form-group'>
 {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm btn-primary form-control']) !!}
</div>
