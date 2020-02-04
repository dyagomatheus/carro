@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="spur-card-title">Lista de Serviços Realizados</div>
        <a href="{{route('service.create')}}" class="btn btn-success ml-5">Novo</a>
        </div>
        @if(count($services) > 0)
        <div class="card-body ">
            <table class="table table-hover table-in-card">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Chassi</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Serviços</th>
                        <th scope="col">Data</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <th scope="row">{{$service->id}}</th>
                        <td>{{$service->car->chassis}}</td>
                        <td>{{$service->car->model}}</td>
                        <td>
                            @foreach ($service->performeds as $performed)
                                <p>{{ $performed->description}} </p>
                            @endforeach
                        </td>
                        <td>{{$service->created_at}}</td>
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
