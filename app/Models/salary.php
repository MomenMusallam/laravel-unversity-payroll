<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'payment_method',
        'salary_amount',
        'tax',
        'total_salary',
        ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
