<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class JournalPost extends Model { protected $fillable = ['title','slug','category','excerpt','body','author','image_url','published_at']; protected function casts(): array { return ['published_at' => 'datetime']; } }