@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="spur-card-title">Lista de Clients</div>
        <a href="{{route('client.create')}}" class="btn btn-success ml-5">Novo</a>
        </div>
        @if(count($clients) > 0)
        <div class="card-body ">
            <table class="table table-hover table-in-card">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome Fantasia</th>
                        <th scope="col">Código</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <th scope="row">{{$client->id}}</th>
                        <td>{{$client->fantasy_name}}</td>
                        <td>{{$client->code}}</td>
                        <td>{{$client->cnpj}}</td>
                    <td>                        
                        <a href="{{route('client.show', $client->id)}}" class="btn btn-primary">Visualizar</a>
                        <a href="{{route('client.edit', $client->id)}}" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Deletar</a>
                    </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <span class="alert alert-info mt-2"> Nenhum cliente cadastrado. <a href="{{route('client.create')}}"> Cadastre o primeiro</a></span>
        @endif
    </div>
</div>
@endsection
