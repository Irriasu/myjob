<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class diplome extends Model
{
    use HasFactory;

    public function candidat():BelongsTo
    {
        return $this->belongsTo(candidat::class);
    }
}

