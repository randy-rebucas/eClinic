<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'vaccine',
        'dose'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
