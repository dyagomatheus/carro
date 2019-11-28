@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                    <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="spur-card-title">Extrato por periodo - {{$title}}</div>
        </div>
        <div class="card-body ">
            <form action="{{route('transaction.extract.sales')}}" method="post">
                @csrf
                    <div class="form-group row">
                        <label for="start" class="col-4 col-form-label text-right">{{ __('desde o dia') }}</label>

                        <div class="col-6">
                            <input id="start" type="date" class="form-control" name="start"  required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-4 col-form-label text-right">{{ __('até o dia') }}</label>

                        <div class="col-6">
                            <input id="end" type="date" class="form-control" name="end"  required >
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-6 offset-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Continuar') }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="spur-card-title">Meus Lançamentos</div>
        </div>
        @if(count($transactions) > 0)
        <div class="card-body ">
            <table class="table table-hover table-in-card">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Data</th>
                        <th scope="col">Parcelas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Liberado</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data Liberação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key=>$transaction)
                    @if($transaction->payment_type == 'Transferencia')
                    <tr class="text-danger">
                        <td><span> Transferência </span></td>
                        <td>{{  date('d/m/Y', strtotime($transaction->date_sale))}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>- R$ {{ str_replace(".", ",", $transaction->sale_amount) }}</td>
                        <td></td>
                    </tr>
                    @else
                    <tr>
                        <td>{{$transaction->flag}} - {{$transaction->payment_type == 'debit' ? 'Débito' : 'Crédito'}}</td>
                        <td>{{  date('d/m/Y', strtotime($transaction->date_sale))}}</td>
                        <td>{{$transaction->installments}}</td>
                        <td>{{$transaction->status == 'succeeded' ? 'Aprovado' : 'Cancelado'}}</td>
                        <td>{{$transaction->released == 1 ? 'Sim' : 'Não'}}</td>
                        <td>R$ {{ str_replace(".", ",", $transaction->sale_amount) }}</td>
                        <td>{{$transaction->release_date}}</td>
                    </tr>  
                    @endif  
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <span class="alert alert-info mt-2"> Nenhuma transação realizada.</span>
        @endif
    </div>
</div>
@endsection
