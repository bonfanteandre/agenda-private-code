<?php

namespace App\Observers;

use App\Services\ActivityFactory;
use App\User;

class UserObserver
{
    /** @var ActivityFactory */
    protected $activityFactory;

    public function __construct(ActivityFactory $activityFactory)
    {
        $this->activityFactory = $activityFactory;
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $this->activityFactory->create('Usuário criado', $user->__toString());
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $this->activityFactory->create('Usuário atualizado', $user->__toString());
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $this->activityFactory->create('Usuário excluído', $user->__toString());
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        $this->activityFactory->create('Usuário restaurado', $user->__toString());
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        $this->activityFactory->create('Usuário excluído permanentemente', $user->__toString());
    }
}
