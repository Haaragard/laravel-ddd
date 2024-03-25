<?php

namespace App\Infrastructure\Database\Eloquent\Models;

class UserModel extends BaseModel
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
    ];
}
