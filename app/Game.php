<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    protected $fillable = [ 'name', 'streamurl','show_questions'];

    public function rounds(){
      return $this->hasMany('App\Round');
    }

    public function questions(){
      return $this->hasManyThrough('App\Question', 'App\Round');
    }

    public function teams(){
      return $this->hasMany('App\Team');
    }
}
