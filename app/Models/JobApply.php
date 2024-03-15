<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{

    protected $fillable = ['candidate_id','job_id','title','experience'];


    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
