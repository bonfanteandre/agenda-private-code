<?php

namespace App\Services;

use App\Activity;

class ActivityFactory
{
    public function create(string $event, string $content)
    {
        $newActivity = new Activity;
        $newActivity->event = $event;
        $newActivity->content = $content;
        $newActivity->user_id = auth()->user()->id;
        $newActivity->save();
    }
}
