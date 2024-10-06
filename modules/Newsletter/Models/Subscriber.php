<?php

namespace Modules\Newsletter\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['email'];
}
