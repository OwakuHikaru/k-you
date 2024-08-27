<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    
    public function post()
    {
    return $this->hasMany(Post::class);
    }
    
    public function bookmark()
    {
    return $this->belongsTo(Bookmark::class);
    }
}
