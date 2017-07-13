<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShiftTime extends Model
{
    use SoftDeletes;

    protected $fillable = ['start', 'end'];
}
