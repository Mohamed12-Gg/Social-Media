<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "users";

        protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'image',
        'created_at',
        'updated_at'

    ];

    public function posts()  // ✅ hasMany مش hasOne
    {
        return $this->hasMany(Post::class);
    }
}
