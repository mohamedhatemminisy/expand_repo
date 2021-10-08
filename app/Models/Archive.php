<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    public function copyTo(){
        return $this->hasMany(CopyTo::class);
    }
    public function relatedTo(){
        return $this->hasMany(linkedTo::class);
    }
    public function archiveFiles(){
        return $this->hasMany(File::class);
    }
 
    public function files() {
        return $this->archiveFiles()->where('model_name','App\Models\Archive');
    }
}
