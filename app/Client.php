<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email'];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
