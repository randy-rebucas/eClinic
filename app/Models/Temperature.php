<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'temperature'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
