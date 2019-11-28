<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Models\Client;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        return view('user.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::find($request->client_id);

        $user = User::create([
            'client_id' => $client->id,
            'code' => $client->code,
            'code_two' => null,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'admin' => false
        ]);

        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso');
    }

    public function add()
    {
        $auth = Auth::user();

        $users = User::where('client_id', $auth->client_id)->get();
        return view('user.add', compact('users'));
    }

    public function addUser(Request $request)
    {
        $auth = Auth::user();
        if($request->method('POST')){
            $user = User::create([
                'client_id' => $auth->client_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'admin' => false
            ]);

            return redirect()->route('user.index')->with('success', 'Usuário adicionado com sucesso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $clients = Client::get();
        
        return view('user.edit', compact('user', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if($request->password){
        $user->update([
            'password' => Hash::make($request->password),
            ]);
        };

        return redirect()->back()->with('success', 'Dados alterados com sucesso')->withInput();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userAuth = Auth::user();

        $user = User::find($id);
        
        if($user->client_id == $userAuth->client_id || $userAuth->admin == true){
            $user->delete();
        }else{
            return redirect()->back()->with('fail', 'Você não pode fazer isso.');
        }
        return redirect()->back()->with('success', 'Usuário removido com sucesso');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if($request->password){
        $user->update([
            'password' => Hash::make($request->password),
            ]);
        };

        return redirect()->back()->with('success', 'Dados alterados com sucesso');
    }
}
