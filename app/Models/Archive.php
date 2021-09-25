<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    public function copyTo(){
        return $this->hasMany(CopyTo::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
}
