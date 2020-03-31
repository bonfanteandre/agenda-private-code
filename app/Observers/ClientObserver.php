<?php

namespace App\Observers;

use App\Client;
use App\Services\ActivityFactory;

class ClientObserver
{
    /** @var ActivityFactory */
    protected $activityFactory;

    public function __construct(ActivityFactory $activityFactory)
    {
        $this->activityFactory = $activityFactory;
    }

    /**
     * Handle the client "created" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function created(Client $client)
    {
        $this->activityFactory->create('Cliente criado', $client->__toString());
    }

    /**
     * Handle the client "updated" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function updated(Client $client)
    {
        $this->activityFactory->create('Cliente atualizado', $client->__toString());
    }

    /**
     * Handle the client "deleted" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function deleted(Client $client)
    {
        $this->activityFactory->create('Cliente excluido', $client->__toString());
    }

    /**
     * Handle the client "restored" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function restored(Client $client)
    {
        $this->activityFactory->create('Cliente restaurado', $client->__toString());
    }

    /**
     * Handle the client "force deleted" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        $this->activityFactory->create('Cliente excluído definitivamente', $client->__toString());
    }
}
