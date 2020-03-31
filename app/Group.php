<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'user_groups';

    protected  $fillable = ['name', 'can_view_phones', 'can_edit_phones', 'can_delete_phones', 'can_view_activities'];
}
