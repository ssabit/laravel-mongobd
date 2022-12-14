<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    /**
     * Author Observer
     *
     *event - deleting
     *
     * info - Relation with books delete on author delete
     *
     */

    use HasFactory;

    protected $guarded = [];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($model) {
    //         $model->books()->delete();
    //     });
    // }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
