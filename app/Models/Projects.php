<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    
    protected $fillable = [
       
    ];

    public function activities()
    {
        return $this->hasMany(Activities::class,'project_id');
    }
}
