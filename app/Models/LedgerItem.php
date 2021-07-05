<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LedgerItem extends Model
{
    use HasFactory;

    const TYPE_CREDIT = 1;
    const TYPE_DEBIT  = 2;

    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }
}
