<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
