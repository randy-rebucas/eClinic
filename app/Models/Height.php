<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Height extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'height'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
