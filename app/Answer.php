<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [ 'answer' , 'credit' , 'team_id' , 'question_id'];

    public function question(){
      return $this->belongsTo('App\Question');
    }
    public function team(){
      return $this->belongsTo('App\Team');
    }
}
