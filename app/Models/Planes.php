<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Planes extends Model
{
    protected $fillable = [
        "name",
        "seats"
    ];

    public function flights(): HasMany
    {
        return $this->hasMany(Flights::class);
    }
}

