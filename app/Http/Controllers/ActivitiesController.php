<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function my()
    {
        $activities = auth()
            ->user()
            ->activities()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('activities.my', compact('activities'));
    }

    public function all()
    {
        abort_unless(auth()->user()->canViewActivities(), 401);

        $activities = Activity::query()->orderBy('created_at', 'desc')->get();

        return view('activities.all', compact('activities'));
    }

    public function view(Activity $activity)
    {
        abort_unless(
            auth()->user()->canViewActivities() ||
            $activity->user->id === auth()->user()->id
        , 401);

        return view('activities.view', compact('activity'));
    }
}
