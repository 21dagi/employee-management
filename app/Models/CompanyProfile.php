<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name', '_address', 'city', '_state', 'country',
        'postal_code', 'phone', 'email', 'website', 'logo_path',
        '_description', 'founded_date'
    ];
}
