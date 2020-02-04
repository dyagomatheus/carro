<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Car;
use App\Models\ServicePerformed;

class ServiceController extends Controller
{
    public function index()
    {
        $client = auth()->user()->client_id;

        $services = Service::where('client_id', $client)->get();

        return view('services.list', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function searchCar(Request $request)
    {
        $car = Car::where('chassis', 'like', '%'.$request->chassis.'%')->first();
        return view('services.car', compact('car'));
    }

    public function performed($id)
    {
        $car = Car::find($id);

        return view('services.performed', compact('car'));
    }

    public function store(Request $request)
    {
        $client = auth()->user()->client_id;

        $service = Service::create([
            'car_id' => $request->car_id,
            'client_id' => $client,
            'current_km' => $request->current_km,
        ]);

        for ($i=0; $i < count($request->service); $i++) { 
            $servicePerformed = ServicePerformed::create([
                'warranty' => $request->warranty[$i],
                'description' => $request->service[$i],
                'return_date' => $request->return_date[$i],
                'service_id' => $service->id,
            ]);
        }

        return redirect()->back()->with('success', 'Cliente cadastrado com sucesso');
    }
}
