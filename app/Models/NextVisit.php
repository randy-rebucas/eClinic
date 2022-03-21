<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextVisit extends Model
{
    use HasFactory;

    protected $table = 'next_visits';

    protected $fillable = [
        'patient_id',
        'schedule_at',
        'note'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
