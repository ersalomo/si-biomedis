<?php

namespace App\Trait;

use Illuminate\Support\Str;

trait UuidTrait
{
    public static function bootUuidForKey()
    {
        static::retrieved(function (Model $model) {
            $model->incrementing = false;  // this is used after instance is loaded from DB
        });
        static::creating(function (Model $model) {
            $model->incrementing = false; // this is used for new instances
            if (empty($model->{$model->getKeyName()})) { // if it's not empty, then we want to use a specific id
                $model->{$model->getKeyName()} = (string)Uuid::uuid4();
            }
        });
    }

    public function initializeUuidForKey()
    {
        $this->keyType = 'string';
    }
}
