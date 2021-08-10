<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diagnose extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prescription(): HasMany
    {
      return $this->hasMany(Prescription::class)->with('medicine');
    }

    public function checkin(): BelongsTo
    {
        return $this->belongsTo(CheckIn::class, 'check_ins_id');
    }
}
