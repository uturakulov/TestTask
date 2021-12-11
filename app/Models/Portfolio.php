<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['img', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id', 'id');
    }
}
