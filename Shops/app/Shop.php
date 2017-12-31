<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $hidden = ["created_at", "updated_at"];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot("type", "timer");
    }

    public static function nearByLocation()
    {

    }
}
