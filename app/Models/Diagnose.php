<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnose extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prescription(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(Prescription::class);
    }

    public function checkin(): BelongsTo
    {
        return $this->belongsTo(CheckIn::class, 'check_ins_id');
    }
}
