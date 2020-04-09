<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeopardy extends Model
{
      protected $table = 'jeopardy';
      protected $fillable = [ 'question' , 'answer'];
}
