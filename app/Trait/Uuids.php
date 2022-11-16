<?php

namespace App\Trait;

use Ramsey\Uuid\Uuid;

trait Uuids
{
    // Boot function from laravel.
    public static function bootUuids()
    {
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}
