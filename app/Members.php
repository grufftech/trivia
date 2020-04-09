<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{

      protected $table = 'members';
      protected $fillable = [ 'user_id' , 'team_id'];

      public function team(){
          return $this->belongsTo('App\Team');
      }
      public function members()
      {
        return $this->hasMany('App\User');
      }
}
