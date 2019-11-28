<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Client;
use App\Models\Balance;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.import');
    }

    public function create()
    {
        $clients = Client::get();
        return view('transaction.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $row = $request->toArray();

        //dd($row);
        $client = Client::find($row['client_id']);

        $release = Balance::where('client_id', $client->id)->first();
        if($release && $row['status'] == 'succeeded'){
            $release->release = $release['release'] + str_replace(",", ".", $row['sale_amount']);
            $release->save();
        }
        if(!$release && $row['status'] == 'succeeded'){
            $release = new Balance();
            $release->client_id = $client->id;
            $release->release = str_replace(",", ".", $row['sale_amount']);
            $release->save();
        }

        $transaction =  Transaction::create([
            'client_id'             => $client->id,
            'date_sale'             => $row['date_sale'],
            'description'           => $row['description'],
            'installments'          => $row['installments'],
            'status'                => $row['status'],
            'payment_type'          => $row['payment_type'],
            'sale_amount'           => str_replace(",", ".", $row['sale_amount']),
            'flag'                  => $row['flag'],
            'establishment_name'    => $client->fantasy_name,
            'cpf_cnpj'              => $client->cnpj,
            'release_date'          => $row['release_date'],
            'released'              => false,
        ]);

        return redirect()->back()->with('success', 'Lançaento com sucesso');
    }

    public function import(Request $request) 
    {
        //dd(request()->file('file')); 

        Excel::import(new TransactionsImport, request()->file('file'));
        
        return redirect()->back()->with('success', 'Dados importados com sucesso');
    }

    public function myTransactions()
    {
        $user = Auth::user();
        $m = date('m');
        $y = date('Y');
        $transactions = Transaction::where('client_id', $user->client_id )
        ->whereMonth('date_sale', $m)
        ->whereYear('date_sale', $y)
        ->orderBy('date_sale','DESC')->get();
       // dd($transactions);
        return view('transaction.list', compact('transactions'));
    }

    
    public function sales()
    {
        $user = Auth::user();
        $m = date('m');
        $y = date('Y');

        $transactions = Transaction::where('client_id', $user->client_id )
        ->whereNotNull('flag')
        ->whereMonth('date_sale', $m)
        ->whereYear('date_sale', $y)
        ->orderBy('date_sale','DESC')
        ->get();

        $title = 'VENDAS';

       // dd($transactions);
        return view('transaction.extract.sales', compact('transactions', 'title'));
    }

    public function extractSales(Request $request)
    {
        $user = Auth::user();

        $transactions = Transaction::where('client_id', $user->client_id )
        ->whereNotNull('flag')
        ->whereBetween('date_sale', array($request->start, $request->end))
        ->orderBy('date_sale','DESC')
        ->get();

        $title = 'VENDAS';

        return view('transaction.extract.sales', compact('transactions', 'title'));
    }

    public function transfers()
    {
        $user = Auth::user();
        $m = date('m');
        $y = date('Y');
        $transactions = Transaction::where('client_id', $user->client_id )
        ->where('payment_type', 'Transferencia')
        ->whereMonth('date_sale', $m)
        ->whereYear('date_sale', $y)
        ->orderBy('date_sale','DESC')
        ->get();
        $title = 'SAQUES';
       // dd($transactions);
        return view('transaction.extract.transfers', compact('transactions', 'title'));
    }

    public function extractTransfers(Request $request)
    {
        $user = Auth::user();

        $transactions = Transaction::where('client_id', $user->client_id )
        ->where('payment_type', 'Transferencia')
        ->whereBetween('date_sale', array($request->start, $request->end))
        ->orderBy('date_sale','DESC')
        ->get();

        $title = 'SAQUES';

        return view('transaction.extract.transfers', compact('transactions', 'title'));
    }

    public function extract(Request $request)
    {
        $user = Auth::user();

        $transactions = Transaction::where('client_id', $user->client_id )->whereBetween('date_sale', array($request->start, $request->end))->orderBy('date_sale','DESC')->get();

        return view('transaction.list', compact('transactions'));
    }

    public function debit()
    {
        $user = Auth::user();

        $clients = Client::get();
        return view('transaction.debit', compact('clients'));
    }

    public function debitStore(Request $request)
    {
        $row = $request->toArray();

        //dd($row);
        $client = Client::find($row['client_id']);

        $release = Balance::where('client_id', $client->id)->first();

        $release->client_id = $client->id;
        $release->balance = ($release->balance - str_replace(",", ".", $row['sale_amount']));
        $release->save();

        $transaction =  Transaction::create([
            'client_id'             => $client->id,
            'date_sale'             => $row['date_sale'],
            'description'           => $row['description'],
            'payment_type'          => 'Transferencia',
            'sale_amount'           => str_replace(",", ".", $row['sale_amount']),
            'establishment_name'    => $client->fantasy_name,
            'cpf_cnpj'              => $client->cnpj,
            'released'              => false,
        ]);

        return redirect()->back()->with('success', 'Transferencia realizada com sucesso');
    }
}
