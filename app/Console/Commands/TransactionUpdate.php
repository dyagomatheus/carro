<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Client;
use App\Models\Balance;
use App\User;

class TransactionUpdate extends Command
{
    /**
     * A Document Header Reference
     *
     * @var \App\Models\RecordTypes\FiscalNoteHeader
     */
    private $documentHeader;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'automatic transaction update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::get();
        
        foreach($users as $user){
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
        }
    }
}
