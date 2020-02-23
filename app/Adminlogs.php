<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminlogs extends Model
{
    protected $fillable = [
      'admin_id','admin_name','date','time_in','time_out','time_total',
    ];
}
