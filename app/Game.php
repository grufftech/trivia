<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;
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
