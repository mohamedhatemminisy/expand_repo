<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveLicense extends Model
{
    // public function files(){
    //     return $this->hasMany(File::class,'archive_id');
    // }

    public function archiveFiles(){
        return $this->hasMany(File::class,'archive_id');    
    }
 
    public function files() {
        return $this->archiveFiles()->where('model_name','App\Models\ArchiveLicense');
    }
}
