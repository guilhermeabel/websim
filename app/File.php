<?php

namespace WebSim;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['user_id', 'name', 'data'];
    
    public function plots()
    {
        return $this->hasMany('WebSim\Plot');
    }
}