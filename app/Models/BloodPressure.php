<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressure extends Model
{
    use HasFactory;

    protected $table = 'blood_pressures';

    protected $fillable = [
        'patient_id',
        'systolic',
        'diastolic',
        'heart_rate'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
