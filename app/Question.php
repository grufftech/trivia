<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [ 'question' , 'round_id' , 'answer'];

    public function round(){
        return $this->belongsTo('App\Round');
    }
    public function answers(){
      return $this->hasMany('App\Answer');
    }
}
