<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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

        $users = User::query()
            ->orderBy('id', 'desc')
            ->get();
        $successMessage = $request->session()->get('successMessage');

        return view('users.index', compact('users', 'successMessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(auth()->user()->isMaster(), 401);

        $groups = Group::query()
            ->orderBy('name')
            ->get();

        return view('users.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        abort_unless(auth()->user()->isMaster(), 401);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_group_id = $request->user_group_id;
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->flash('successMessage', "O usuário {$user->name} foi cadastrado com sucesso!");

        return redirect('/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_unless(auth()->user()->isMaster(), 401);

        $groups = Group::query()
            ->orderBy('name')
            ->get();

        return view('users.edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        abort_unless(auth()->user()->isMaster(), 401);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_group_id = $request->user_group_id;
        $user->save();

        $request->session()->flash('successMessage', "O usuário {$user->name} foi atualizado com sucesso!");

        return redirect('/users');
    }
}
