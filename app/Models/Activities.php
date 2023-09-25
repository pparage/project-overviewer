<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Activities extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'projects_id',
    ];

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }
}
