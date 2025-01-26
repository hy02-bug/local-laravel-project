<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicianFactory> */
    use HasFactory;

    protected $fillable = [
        'Name',
        'Email',
        'College',
        'Department',
        'Position',
    ];

    // Academician Model
    public function grants() {
    return $this->hasMany(Grant::class,'project_leader_id');
}

    public function grantMember()
{
    return $this->belongsToMany(Grant::class, 'grant_academician', 'academician_id', 'grant_id');
}
}
