<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobLicArchieve extends Model
{
    public function files(){
        return $this->hasMany(File::class,'archive_id');
    }
}
