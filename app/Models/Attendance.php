<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    protected $fillable = [
        'employee_id',
        '_date',
        '_status',
    ];

    // Define relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
