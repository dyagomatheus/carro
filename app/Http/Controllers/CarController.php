<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Car;
use App\Models\Client;
use App\User;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::get();
        
        return view('car.list', compact('cars'));
    }

    public function create()
    {
        $clients = Client::get();
        return view('car.create', compact('clients'));
    }

    public function store(Request $request)
    {
        
        $car = Car::where('chassis', $request->chassis)->first();

        if($car){
            return redirect()->route('services.performed', $car->id)->with('success', 'Este carro já existe, cadastre um serviço');
        }

        $car = Car::create($request->all());

        $user = User::create([
            'car_id' => $car->id,
            'code' => $car->chassis,
            'code_two' => null,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'admin' => 2
        ]);

        return redirect()->route('car.index')->with('success', 'Carro cadastrado com sucesso');
    }

    public function show($id)
    {
        $car = Car::find($id);
        
        return view('car.show', compact('car'));
    }

}
