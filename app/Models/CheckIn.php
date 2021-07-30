<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'patient_id'];

    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class, );
    }

    public function patient (): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function diagnose (): HasMany
    {
        return $this->hasMany(Diagnose::class);
    }
}
