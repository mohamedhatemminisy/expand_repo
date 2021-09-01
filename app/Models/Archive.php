<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    public function copyTo(){
        return $this->hasMany(CopyTo::class);
    }

    protected $casts = [
        'fileIDS' => 'array',
    ];
}
