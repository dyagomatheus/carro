<?php

namespace App\Imports;

use App\Models\Transaction;
use App\Models\Balance;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DateTime;
use Carbon\Carbon;

class TransactionsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        $client = Client::where('cnpj', $row['cpfcnpj'])->first();
        $release = Balance::where('client_id', $client->id)->first();
        if($release && $row['status'] == 'succeeded'){
            $release->release = $release['release'] + str_replace(",", ".", $row['valor_da_venda']);
            $release->save();
        }
        if(!$release && $row['status'] == 'succeeded'){
            $release = new Balance();
            $release->client_id = $client->id;
            $release->release = str_replace(",", ".", $row['valor_da_venda']);
            $release->save();
        }
        return new Transaction([
            'client_id'             => $client->id,
            'date_sale'             => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['data_da_venda']),
            'description'           => $row['descricao'],
            'installments'          => $row['numero_de_parcelas'],
            'status'                => $row['status'],
            'payment_type'          => $row['tipo_de_pagamento'],
            'sale_amount'           => str_replace(",", ".", $row['valor_da_venda']),
            'flag'                  => $row['bandeira'],
            'establishment_name'    => $row['nome_do_estabelecimento'],
            'cpf_cnpj'              => $row['cpfcnpj'],
            'release_date'          => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['data_de_liberacao']),
            'released'              => false,
        ]);
    }
}
