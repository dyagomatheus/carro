@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card spur-card">
            <div class="card-header">
                <div class="spur-card-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="spur-card-title"> Realizar Lançamento </div>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('transaction.store') }}">
                    @csrf
                    <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                        <div class="col-md-6">
                        <select name="client_id" id="client_id" class="form-control">
                            <option disabled selected> -- Escolha -- </option>
                            @foreach ($clients as $client   )
                                <option value="{{$client->id}}"> {{$client->fantasy_name}} </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_sale" class="col-md-4 col-form-label text-md-right">{{ __('Data da Venda') }}</label>

                        <div class="col-md-6">
                            <input id="date_sale" type="date" class="form-control" name="date_sale"  required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control" name="description" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="installments" class="col-md-4 col-form-label text-md-right">{{ __('Parcelas') }}</label>
                        <div class="col-md-6">
                        <select name="installments" id="installments" class="form-control" >
                            <option value="" disabled selected>-- selecione --</option>
                        @php
                            for ($i=1; $i <= 12; $i++) { 
                                echo '<option value="'.$i.'">'.$i.' x</option>';
                            }
                        @endphp
                        </select>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control" >
                                <option value="" disabled selected>-- selecione --</option>
                                <option value="succeeded"> Sucesso </option>
                                <option value="failed" > Falha </option>

                            </select>
                         </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="payment_type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Pagamento') }}</label>
                        <div class="col-md-6">
                            <select name="payment_type" id="payment_type" class="form-control" >
                                <option value="" disabled selected>-- selecione --</option>
                                <option value="credit"> Crédito </option>
                                <option value="debit" > Débito </option>

                            </select>
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="sale_amount" class="col-md-4 col-form-label text-md-right">{{ __('Valor da venda') }}</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="sale_amount" step=".01" placeholder="0,00">
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="flag" class="col-md-4 col-form-label text-md-right">{{ __('Bandeira') }}</label>
                        <div class="col-md-6">
                            <select name="flag" id="flag" class="form-control" >
                                <option value="" disabled selected>-- selecione --</option>
                                <option value="MasterCard"> MasterCard </option>
                                <option value="Elo" > Elo </option>
                                <option value="Visa Electron" > Visa Electron </option>
                            </select>
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="release_date" class="col-md-4 col-form-label text-md-right">{{ __('Data de Liberação') }}</label>

                        <div class="col-md-6">
                            <input id="release_date" type="date" class="form-control" name="release_date"  required >
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enviar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection