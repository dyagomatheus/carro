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

class DashboardController extends Controller
{
    public function index()
    {
       $clients = Client::where('status', false)->get();

       return view('home', compact('clients'));
    }
}
