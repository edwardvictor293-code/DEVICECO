<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'category', 'tagline', 'description', 'price', 'weight', 'frame_material', 'wheel_info', 'drivetrain', 'brakes', 'image_url', 'featured'];

    protected function casts(): array
    {
        return ['price' => 'decimal:2', 'featured' => 'boolean'];
    }
}