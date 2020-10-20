<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Team extends Model
{
    use SoftDeletes;
    protected $table = 'teams';
    protected $fillable = [ 'name','game_id','credit_modifier'];
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
