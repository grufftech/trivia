<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [ 'name','game_id'];
    public function game(){
        return $this->belongsTo('App\Game');
    }
    public function members(){
      return $this->hasMany('App\Members');
    }
    public function answers(){
      return $this->hasMany('App\Answers');
    }

}
