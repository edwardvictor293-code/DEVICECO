<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BikeConfiguration extends Model { protected $fillable = ['user_id', 'bicycle_id', 'options', 'total_price']; protected function casts(): array { return ['options' => 'array', 'total_price' => 'decimal:2']; } }