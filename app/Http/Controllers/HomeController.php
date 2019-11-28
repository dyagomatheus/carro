<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Balance;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // $date = getdate();

        // $balance = Balance::where('client_id', $user->client_id)
        // ->first();

        // $transactionsToday = Transaction::where('client_id', $user->client_id)
        // ->where('status', 'succeeded')
        // ->whereDay('date_sale', $date['mday'])
        // ->whereMonth('date_sale', $date['mon'])
        // ->whereYear('date_sale', $date['year'])
        // ->get();
        
        // $transactionsYear = Transaction::where('client_id', $user->client_id)
        // ->where('status', 'succeeded')
        // ->whereYear('date_sale', $date['year'])
        // ->get();

        // $transactionsMonth = Transaction::where('client_id', $user->client_id)
        // ->where('status', 'succeeded')
        // ->whereMonth('date_sale', $date['mon'])
        // ->whereYear('date_sale', $date['year'])
        // ->get();

        // $transactionsTotal = Transaction::where('client_id', $user->client_id)
        // ->where('status', 'succeeded')
        // ->get();
        
        // $transfersToday = Transaction::where('client_id', $user->client_id)
        // ->where('payment_type', 'Transferencia')
        // ->whereDay('date_sale', $date['mday'])
        // ->whereMonth('date_sale', $date['mon'])
        // ->whereYear('date_sale', $date['year'])
        // ->get();
        
        // $transfersYear = Transaction::where('client_id', $user->client_id)
        // ->where('payment_type', 'Transferencia')
        // ->whereYear('date_sale', $date['year'])
        // ->get();

        // $transfersMonth = Transaction::where('client_id', $user->client_id)
        // ->where('payment_type', 'Transferencia')
        // ->whereMonth('date_sale', $date['mon'])
        // ->whereYear('date_sale', $date['year'])        
        // ->get();

        // $transfersTotal = Transaction::where('client_id', $user->client_id)
        // ->where('payment_type', 'Transferencia')
        // ->get();
        
        // //dd($transactionsTotal);
        // //transactions of sales
        // $today = $transactionsToday->sum('sale_amount');
        // $year = $transactionsYear->sum('sale_amount');
        // $month = $transactionsMonth->sum('sale_amount');
        // $total = $transactionsTotal->sum('sale_amount');

        // //transactions of transfers
        // $transfersToday = $transfersToday->sum('sale_amount');
        // $transfersYear = $transfersYear->sum('sale_amount');
        // $transfersMonth = $transfersMonth->sum('sale_amount');
        // $transfersTotal = $transfersTotal->sum('sale_amount');

        return view('home', compact('balance', 'today', 'week', 'month', 'year', 'total', 'transfersToday', 'transfersYear', 'transfersMonth', 'transfersTotal'));
    }

    public function balance()
    {
        $user = Auth::user();

        $transactions = Transaction::where('client_id', $user->client_id)->get();
        $balance = Balance::where('client_id', $user->client_id)->first();

        foreach ($transactions as $transaction) {
            if($transaction->release_date <= date('Y-m-d') && $transaction->status == 'succeeded' &&  $transaction->released == false){
                $transaction->update([
                    'released' => true
                ]);

                $balance->balance = $balance['balance'] + str_replace(",", ".", $transaction->sale_amount);
                $balance->release = $balance['release'] - str_replace(",", ".", $transaction->sale_amount);
                $balance->save();
            }
        };


        return redirect()->route('home');
    }
}
