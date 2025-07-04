<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id', // ✅ Add this
    ];

    // ✅ Relationship: A post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
