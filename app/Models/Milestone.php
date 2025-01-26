<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    /** @use HasFactory<\Database\Factories\MilestoneFactory> */
    use HasFactory;

    protected $fillable = [
        'grant_id',
        'milestone_name',
        'target_completion_date',
        'deliverable',
        'status',
        'remark',
        'date_updated',
    ];

    public function grant(){
        return $this->belongsTo(Grant::class);
    }
}
