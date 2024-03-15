<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobWish extends Model
{
    protected $fillable = ['job_id','candidate_id'];
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

}
