<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'user_group_id', 'id');
    }

    public function canViewPhones()
    {
        return $this->group->can_view_phones;
    }

    public function canEditPhones()
    {
        return $this->group->can_edit_phones;
    }

    public function canDeletePhones()
    {
        return $this->group->can_delete_phones;
    }

    public function canViewActivities()
    {
        return $this->group->can_view_activities;
    }
}
