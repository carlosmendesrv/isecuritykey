<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Key extends Model
{
    use Uuid;
    use SoftDeletes;
    use Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'icon',
        'title',
        'username',
        'password',
        'quality',
        'url',
        'notes',
        'expires',
        'is_private',
        'category_id'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
