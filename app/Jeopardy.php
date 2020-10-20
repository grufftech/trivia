<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jeopardy extends Model
{
      use SoftDeletes;
      protected $table = 'jeopardy';
      protected $fillable = [ 'question' , 'answer'];
}
