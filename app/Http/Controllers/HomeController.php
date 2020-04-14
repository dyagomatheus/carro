<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Client;
use App\User;
use App\Http\Requests\StoreClient;
use App\Mail\SendMailUser;

class HomeController extends Controller
{
    public function store(StoreClient $request)
    {
        $client = Client::create($request->all());

        $user = User::create([
            'client_id' => $client->id,
            'code' => $client->code,
            'code_two' => null,
            'name' => $client->fantasy_name,
            'email' => $request->email,
            'password' => Hash::make('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'admin' => false
        ]);

        Mail::to([$user->email, 'sac@carrocertoapp.com.br'])->send(new SendMailUser($user, $client));

        return redirect('cadastro-oficinas')->with('success', 'Cliente cadastrado com sucesso');
    }
}
