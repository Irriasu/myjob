<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class candidat extends Model
{
    use HasFactory;
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function certificat():HasMany
    {
        return $this->hasMany(certificat::class);
    }

    public function diplome():HasMany
    {
        return $this->hasMany(diplome::class);
    }


    public function anonce():HasMany
    {
        return $this->hasMany(anonce::class);
    }
}
