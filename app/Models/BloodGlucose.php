<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGlucose extends Model
{
    use HasFactory;

    protected $table = 'blood_glucoses';

    protected $fillable = [
        'patient_id',
        'measurement',
        'type'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
