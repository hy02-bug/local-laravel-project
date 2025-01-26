<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    /** @use HasFactory<\Database\Factories\GrantFactory> */
    use HasFactory;

    protected $fillable = [
        'Title',
        'Amount',
        'Provider',
        'Start_Date',
        'Duration_months',
        'project_leader_id',
    ];

    public function projectLeader() {
        return $this->belongsTo(Academician::class,'project_leader_id');
    }

    public function projectMember(){
        return $this->belongsToMany(Academician::class,'academician_grant','grant_id','academician_id');
    }

    public function milestone(){
        return $this->hasMany(Milestone::class);
    }
}
