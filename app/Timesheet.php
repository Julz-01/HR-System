<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = [
      'user_id','user_name','date','time_in','time_out','time_total',
    ];
}
