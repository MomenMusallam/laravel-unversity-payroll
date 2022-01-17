<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullTimeEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'specialization', 'graduation_year', 'year_of_appointment', 'salary_amount', 'number_of_vacations',
        'tax', 'payment_method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class );
    }
}
