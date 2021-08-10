<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender_id','patient_id'];



    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function checkIn(): HasMany
    {
        return $this->hasMany(CheckIn::class);
    }
}
