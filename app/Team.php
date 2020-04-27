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
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function answers(){
      return $this->hasMany('App\Answers');
    }

}
