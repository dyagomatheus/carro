@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="spur-card-title"> Meu Histórico</div>
                </div>
                <div class="card-body ">
                    <div class="card">
                    <ul class="list-group list-group-flush">
                        @foreach ($car->services as $service)
                        <li class="list-group-item"> {{$service->client->fantasy_name }}| {{$service->created_at}} | {{$service->description}}</li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection