<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'job_id',
        'facebook',
        'twitter',
        'dribble',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
