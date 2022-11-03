<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'reservation_date',
        'table_id',
        'guest_number',
    ];

    protected $dates = ['reservation_date'];

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
