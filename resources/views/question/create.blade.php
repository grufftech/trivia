
<div class='form-inline'>
    {{Form::open(array('route' => 'questions.create', 'onsubmit'=>'this.submit(); this.reset(); return false;','target'=>'my_iframe'.$loop->iteration,'id' => 'formAnswers'.$loop->iteration))}}
    {!! Form::text('question', '', ['placeholder'=>'question','class' => 'form-control','required']) !!}
    {!! Form::text('answer','' , ['placeholder'=>'answer','class' => 'form-control','required']) !!}
    {!! Form::hidden('round_id', $round->id); !!}
    {!! Form::submit('New Question', ['class' => 'btn btn-sm btn-primary form-control']) !!}
    {!! Form::close() !!}
    <iframe name="my_iframe{{$loop->iteration}}" src=""></iframe>
</div>
