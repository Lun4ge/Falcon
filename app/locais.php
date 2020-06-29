<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locais extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function items()
    {
        return $this->belongsToMany(items::class);
    }
}
