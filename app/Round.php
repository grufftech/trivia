<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model
{
    use SoftDeletes;
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
