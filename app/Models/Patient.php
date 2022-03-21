<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function heights()
    {
        return $this->hasMany(Height::class);
    }

    public function weights()
    {
        return $this->hasMany(Weight::class);
    }

    public function blood_pressures()
    {
        return $this->hasMany(BloodPressure::class);
    }

    public function blood_glucoses()
    {
        return $this->hasMany(BloodGlucose::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnose::class);
    }

    public function temperatures()
    {
        return $this->hasMany(Temperature::class);
    }

    public function family_histories()
    {
        return $this->hasMany(FamilyHistory::class);
    }

    public function allergies()
    {
        return $this->hasMany(Allergy::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function immunizations()
    {
        return $this->hasMany(Immunization::class);
    }

    public function lab_results()
    {
        return $this->hasMany(LabTest::class);
    }

    public function endorsements()
    {
        return $this->hasMany(Endorsement::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

}
