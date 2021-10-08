<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobLicArchieve extends Model
{
    public function archiveFiles(){
        return $this->hasMany(File::class,'archive_id');    
    }
 
    public function files() {
        return $this->archiveFiles()->where('model_name','App\Models\jobLicArchieve');
    }
}
