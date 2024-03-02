<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class entreprise extends Model
{
    use HasFactory;

    public function rucruter():HasMany
    {
        return $this->hasMany(rucruter::class);
    }
}

