@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="spur-card-title">Lista de Usuários</div>
        <a href="{{route('user.create')}}" class="btn btn-success ml-5">Novo</a>
        </div>
        @if(count($users) > 0)
        <div class="card-body ">
            <table class="table table-hover table-in-card">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->client['fantasy_name']}}</td>
                    <td>
                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                        <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger">Deletar</a>
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
