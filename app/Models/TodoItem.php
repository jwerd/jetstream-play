<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(
            function ($model) {
                if(is_null($model->user_id)) {
                    $model->user_id = auth()->user()->id;
                }

                return $model;
            }
        );
        static::addGlobalScope(new UserScope);
    }
}
