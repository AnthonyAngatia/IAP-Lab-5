<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //Relation with the review model
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
