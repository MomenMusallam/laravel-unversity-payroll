<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartTimeEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'specialization', 'graduation_year', 'date_of_appointment', 'hour_price', 'total_hours',
        'tax', 'payment_method'];
}
