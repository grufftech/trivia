<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $table = 'rounds';

    protected $fillable = [ 'name' , 'game_id'];

    public function game(){
        return $this->belongsTo('App\Game');
    }

    public function questions()
    {
      return $this->hasMany('App\Question');
    }

    public function answers()
    {
      return $this->hasManyThrough('App\Answers','App\Question');
    }
}
