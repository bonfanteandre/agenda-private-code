<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\StoreClient;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $clients = Client::query()
            ->orderBy('name')
            ->get();

        $successMessage = $request->session()->get('successMessage');

        return view('clients.index', compact('clients', 'successMessage'));
    }

    public function create(Request $request)
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

    public function edit(Request $request, Client $client)
    {
        $successMessage = $request->session()->get('successMessage');

        return view('clients.edit', compact('client', 'successMessage'));
    }

    public function update(StoreClient $request, Client $client)
    {
        $request->validated();

        $client->update($request->only(['name', 'email']));

        $request->session()->flash('successMessage', "Cliente {$client->name} foi atualizado com sucesso!");

        return redirect('/clients');
    }

    public function destroy(Request $request, Client $client)
    {
        $client->phones()->delete();
        $client->delete();

        $request->session()->flash('successMessage', "Cliente {$client->name} foi removido com sucesso!");

        return redirect('/clients');
    }
}
