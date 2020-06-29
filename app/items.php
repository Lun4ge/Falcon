<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function locais()
    {
        return $this->belongsToMany(locais::class);
    }
}
