<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;

    protected $table = 'lab_tests';

    protected $fillable = [
        'patient_id',
        'test_at',
        'test',
        'specimen',
        'conventional_units',
        'si_units'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
