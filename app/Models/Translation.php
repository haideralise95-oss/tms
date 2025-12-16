<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Translation extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'locale_code',
        'content',
    ];

    public function tags(): HasMany
    {
        return $this->hasMany(TranslationTag::class);
    }
}
