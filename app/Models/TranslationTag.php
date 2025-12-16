<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TranslationTag extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'translation_id',
        'tag',
    ];

    public function translation(): BelongsTo
    {
        return $this->belongsTo(Translation::class);
    }
}

