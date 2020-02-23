<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = [
   	'user_id', 'date', 'time', 'reason', 'department', 'status', 'note', 'type',
   ];
}
