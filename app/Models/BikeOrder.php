<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BikeOrder extends Model
{
    protected $fillable = [
        'user_id', 'bicycle_id', 'name', 'email', 'address', 'city', 'postal_code', 'total_price', 'status',
    ];

    protected function casts(): array
    {
        return ['total_price' => 'decimal:2'];
    }

    public function bicycle()
    {
        return $this->belongsTo(Bicycle::class);
    }
}
