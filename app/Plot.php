<?php

namespace WebSim;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    protected $fillable = ['file_id', 'name', 'data'];
}
