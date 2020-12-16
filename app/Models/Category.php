<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Uuid;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'notes','instance_id'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'string'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function keys()
    {
        return $this->hasMany(Key::class);
    }
}
