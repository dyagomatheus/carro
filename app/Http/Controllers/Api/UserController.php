<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Schedule $schedule)
    {
        $user = auth()->user();

        $schedules = $schedule->where('car_id', $user->car_id)->with('client', 'car')->get();

        return response()->json($schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notifications(ServicePerformed $performed)
    {
        $user = auth()->user();
        $date = getdate();

        $performeds = $performed->whereMonth('return_date', $date['mon'])->whereYear('return_date', $date['year'])
        ->with('service.client', 'service.car')->get();

        return response()->json($performeds, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

        if(isset($request->password)){
          $user->password = bcrypt($request->password);
          $user->email = $request->email;
          $user->name = $request->name;
          $user->save();
        }else{
          $user->email = $request->email;
          $user->name = $request->name;
          $user->save();
        }

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
