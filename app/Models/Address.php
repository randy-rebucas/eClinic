<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'line_1',
        'line_2',
        'district',
        'city_id',
        'country_id',
        'postal_code',
        'location'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
