<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'user_id',
            'category',
            'amount',
            'transaction_date',
            'description',
            'created_at',
            'updated_at',
        ];
}
