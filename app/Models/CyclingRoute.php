<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CyclingRoute extends Model { protected $table = 'cycling_routes'; protected $fillable = ['name','slug','location','difficulty','distance','elevation','duration_minutes','description','image_url']; }