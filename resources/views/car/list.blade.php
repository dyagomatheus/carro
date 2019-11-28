@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="spur-card-title">Lista de Carros</div>
        <a href="{{route('car.create')}}" class="btn btn-success ml-5">Novo</a>
        </div>
        @if(count($cars) > 0)
        <div class="card-body ">
            <table class="table table-hover table-in-card">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{$car->id}}</th>
                        <td>{{$car->model}}</td>
                        <td>{{$car->board}}</td>
                        <td>{{$car->year}}</td>
                    <td>
                        <a href="{{route('car.edit', $car->id)}}" class="btn btn-warning">Editar</a>
                        <a href="{{route('car.delete', $car->id)}}" class="btn btn-danger">Deletar</a>
                    </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <span class="alert alert-info mt-2"> Nenhum carro cadastrado. <a href="{{route('car.create')}}"> Cadastre o primeiro</a></span>
        @endif
    </div>
</div>
@endsection
