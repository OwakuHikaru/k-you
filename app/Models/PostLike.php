<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $primaryKey = ['user_id', 'post_id'];
    public $incrementing = false;
    use HasFactory;
}
