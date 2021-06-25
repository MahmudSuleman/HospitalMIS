<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function doctor(){
        return $this->belongsTo(Employee::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
}