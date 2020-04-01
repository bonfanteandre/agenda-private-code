<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StoreGroup;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_unless(auth()->user()->isMaster(), 401);

        $groups = Group::query()
            ->orderBy('name')
            ->get();

        $successMessage = $request->session()->get('successMessage');

        return view('groups.index', compact('groups', 'successMessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(auth()->user()->isMaster(), 401);

        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGroup
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroup $request)
    {
        abort_unless(auth()->user()->isMaster(), 401);

        $request->validated();

        $group = new Group;
        $group->name = $request->name;
        $group->can_view_phones = $request->has('can_view_phones');
        $group->can_edit_phones = $request->has('can_edit_phones');
        $group->can_delete_phones = $request->has('can_delete_phones');
        $group->can_view_activities = $request->has('can_view_activities');
        $group->save();

        $request->session()->flash('successMessage', "Grupo {$group->name} foi cadastrado com sucesso!");

        return redirect('/groups');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        abort_unless(auth()->user()->isMaster(), 401);

        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroup $request, Group $group)
    {
        abort_unless(auth()->user()->isMaster(), 401);

        $request->validated();

        $group->name = $request->name;
        $group->can_view_phones = $request->has('can_view_phones');
        $group->can_edit_phones = $request->has('can_edit_phones');
        $group->can_delete_phones = $request->has('can_delete_phones');
        $group->can_view_activities = $request->has('can_view_activities');
        $group->save();

        $request->session()->flash('successMessage', "Grupo {$group->name} foi atualizado com sucesso!");

        return redirect('/groups');
    }
}
