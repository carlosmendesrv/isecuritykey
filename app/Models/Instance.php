<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use Uuid;

    protected $fillable = [
        'name'
    ];

    protected $casts = ['id' => 'string'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
