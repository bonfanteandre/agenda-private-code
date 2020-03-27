<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\StoreClient;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::query()
            ->orderBy('name')
            ->get();

        $successMessage = $request->session()->get('successMessage');

        return view('clients.index', compact('clients', 'successMessage'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClient $request)
    {
        $request->validated();

        $client = Client::create($request->only(['name', 'email']));

        $request->session()->flash('successMessage', "Cliente {$client->name} foi cadastrado com sucesso!");

        return redirect('/clients');
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}