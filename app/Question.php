<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $table = 'questions';
    protected $fillable = [ 'question' , 'round_id' , 'answer'];

    public function round(){
        return $this->belongsTo('App\Round');
    }
    public function answers(){
      return $this->hasMany('App\Answer');
    }
}
