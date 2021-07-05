<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiaryEntry extends Model
{
    use HasFactory;

    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Diary::class);
    }
}
