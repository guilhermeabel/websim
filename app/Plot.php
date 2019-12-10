<?php

namespace WebSim;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    protected $fillable = ['file_id', 'name', 'data'];
    
    public function file()
    {
        return $this->belongsTo('Websim\File');
    }
}