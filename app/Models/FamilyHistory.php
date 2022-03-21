<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHistory extends Model
{
    use HasFactory;

    protected $table = 'family_histories';

    protected $fillable = [
        'patient_id',
        'relationship',
        'history'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
