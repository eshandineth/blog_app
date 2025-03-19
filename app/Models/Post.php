<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];  // mass assignable fields

    public function user()
    {
        return $this->belongsTo(User::class);  // A post belongs to a user
    }
}
