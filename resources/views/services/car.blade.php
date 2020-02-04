@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card spur-card">
        <div class="card-header">
            <div class="spur-card-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="spur-card-title">Carro</div>
        <a href="{{route('service.create')}}" class="btn btn-primary ml-5">Voltar</a>
        </div>
        @if($car)
        <div class="card-body ">
            <table class="table table-hover table-in-card">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Chassi</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Ação</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$car->id}}</th>
                        <td>{{$car->chassis}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->year}}</td>
                        <td>                        
                          <a href="{{route('services.performed', $car->id)}}" class="btn btn-primary">Realizar Serviço</a>
                      </td>                    
                    </tr>  
                </tbody>
            </table>
        </div>
        @else
        <span class="alert alert-info mt-2"> Nenhum carro encontrado. <a href="{{route('service.create')}}"> Procurar outro</a></span>
        @endif
    </div>
</div>
@endsection
