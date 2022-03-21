<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';

    protected $appends = ['age'];
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'mi',
        'gender',
        'address_id',
        'dob',
        'mobile'
    ];

    public function getFullname()
	{
		return "{$this->firstname} {$this->lastname}";
	}

    /**
     * Accessor for Age.
     */
    public function age()
    {
        $query = (object) DB::table('user_profiles')
                ->selectRaw("TIMESTAMPDIFF(YEAR, DATE(dob), current_date) AS age")
                ->first();
        return $query->age;
    }

    // public function countOrder($date)
    // {
    //     return $this->whereMonth('created_at', date('m', strtotime($date)))->count();
    // }

    // public function sumCompletedOrder()
    // {
    //     return $this->whereHas('histories', function (Builder $query) {
    //         $query->where('status', 'completed');
    //     })->sum('grand_total');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
