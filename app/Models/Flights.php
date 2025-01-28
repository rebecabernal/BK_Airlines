<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flights extends Model
{
    protected $fillable = [
        "date",
        "origin",
        "arrival",
        "image",
        "status",
        "plane_id"
    ];


    public function planes(): BelongsTo
    {
        return $this->belongsTo(Planes::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "flight_user");
    }
}