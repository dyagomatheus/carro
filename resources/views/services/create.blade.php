@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="spur-card-title"> Cadastro de Serviço </div>
                </div>
                <div class="card-body ">
                    <form action="{{route('services.searchCar')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Buscar Carro</label>
                                <input type="text" class="form-control" id="chassis" placeholder="Chassi do Carro" name="chassis">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">Check this custom checkbox</label>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection