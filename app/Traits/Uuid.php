<?php


namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
