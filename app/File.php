<?php

namespace WebSim;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'file', 'userId'];
}
