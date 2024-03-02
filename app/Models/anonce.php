<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class anonce extends Model
{
    use HasFactory;

    public function candidat():BelongsToMany
    {
        return $this->belongsToMany(candidat::class);
    }

    public function rucruter():BelongsTo
    {
        return $this->belongsTo(rucruter::class);
    }
}
