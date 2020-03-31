<?php

namespace App\Observers;

use App\Phone;
use App\Services\ActivityFactory;

class PhoneObserver
{
    /** @var ActivityFactory */
    protected $activityFactory;

    public function __construct(ActivityFactory $activityFactory)
    {
        $this->activityFactory = $activityFactory;
    }

    /**
     * Handle the phone "created" event.
     *
     * @param  \App\Phone  $phone
     * @return void
     */
    public function created(Phone $phone)
    {
        $this->activityFactory->create('Telefone criado', $phone->__toString());
    }

    /**
     * Handle the phone "updated" event.
     *
     * @param  \App\Phone  $phone
     * @return void
     */
    public function updated(Phone $phone)
    {
        $this->activityFactory->create('Telefone atualizado', $phone->__toString());
    }

    /**
     * Handle the phone "deleted" event.
     *
     * @param  \App\Phone  $phone
     * @return void
     */
    public function deleted(Phone $phone)
    {
        $this->activityFactory->create('Telefone excluído', $phone->__toString());
    }

    /**
     * Handle the phone "restored" event.
     *
     * @param  \App\Phone  $phone
     * @return void
     */
    public function restored(Phone $phone)
    {
        $this->activityFactory->create('Telefone restaurado', $phone->__toString());
    }

    /**
     * Handle the phone "force deleted" event.
     *
     * @param  \App\Phone  $phone
     * @return void
     */
    public function forceDeleted(Phone $phone)
    {
        $this->activityFactory->create('Telefone excluído definitivamente', $phone->__toString());
    }
}
