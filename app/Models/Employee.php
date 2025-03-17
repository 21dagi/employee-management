<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_entry',
        'position_id',
        'role_id',
        'bank_name',
        'account_number',
        'account_holder',
        'avatar',
    ];

    // Define relationships
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
