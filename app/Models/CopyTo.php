<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopyTo extends Model
{
    public function archive(){
        return $this->belongsTo(Archive::class);
    }

    public function files(){
        return $this->hasMany(File::class,'archive_id');
    }
}
