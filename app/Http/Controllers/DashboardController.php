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
    public function index()
    {
       return view('home');
    }
}
