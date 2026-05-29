<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // app/Models/Like.php
    protected $fillable = ['user_id', 'post_id'];
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
