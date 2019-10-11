<?php

namespace WebSim;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['name', 'data', 'userId'];
}
