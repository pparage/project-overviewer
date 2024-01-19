<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function milestones(): HasMany
    {
        return $this->hasMany(Milestone::class,'project_id')->orderBy('end', 'ASC');
    }
    public function project_team(): HasMany
    {
        return $this->hasMany(ProjectTeam::class,'project_id');
    }
}
