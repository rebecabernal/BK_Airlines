<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flight extends Model
{
    use HasFactory;
    protected $fillable = [
        "date",
        "origin",
        "arrival",
        "status",
        "reserved",
        "plane_id"
    ];


    public function plane(): BelongsTo
    {
        return $this->belongsTo(Plane::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "flight_user");
    }
}