<?php

namespace App\Http\Controllers;

use App\Client;
use App\Phone;
use Illuminate\Http\Request;

class PhonesController extends Controller
{
    public function store(Request $request, Client $client)
    {
        $request->validate(['phone' => 'required']);

        $phone = new Phone();
        $phone->phone = $request->phone;
        $phone->client_id = $client->id;
        $phone->save();

        $request->session()->flash('successMessage', "Telefone {$phone->phone} adicionado com sucesso!");

        return redirect("/clients/{$client->id}");
    }

    public function update(Request $request, Phone $phone)
    {
        $phone->phone = $request->phone;
        $phone->save();
    }

    public function destroy(Request $request, Phone $phone)
    {
        $phone->delete();

        $request->session()->flash('successMessage', 'Telefone excluído com sucesso!');

        return redirect("/clients/{$phone->client->id}");
    }
}
