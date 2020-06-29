@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="spur-card-title"> Visualizando Cliente </div>
                </div>
                <div class="card-body ">
                        {{-- <h3>Lançamentos previstos: {{$client->balance->release}}</h3> --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nome Social</label>
                                <input type="text" value="{{$client->social_name}}" class="form-control" id="social_name" name="social_name" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nome Fantasia</label>
                                <input type="text" value="{{$client->fantasy_name}}" class="form-control" id="fantasy_name" name="fantasy_name" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">CNPJ</label>
                                <input type="text" value="{{$client->cnpj}}" placeholder="Inserir somente números" maxlength="11" class="form-control" id="cnpj" name="cnpj" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Código</label>
                                <input type="text" value="{{$client->code}}" class="form-control" id="code" name="code" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Telefone</label>
                                <input type="text" value="{{$client->telephone}}" placeholder="Inserir somente números" class="form-control" id="telephone" name="telephone" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">CEP</label>
                                <input type="number" value="{{$client->zipcode}}" class="form-control" id="zipcode" name="zipcode" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="inputEmail4">Rua</label>
                                <input type="text" value="{{$client->street}}" class="form-control" id="street" name="street" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">Número</label>
                                <input type="text" value="{{$client->number}}" placeholder="Inserir somente números" class="form-control" id="number" name="number" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Complemento</label>
                                <input type="text" value="{{$client->complement}}" class="form-control" id="complement"  name="complement" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Bairro</label>
                                <input type="text" value="{{$client->district}}" class="form-control" id="district" name="district" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Cidade</label>
                                <input type="text" value="{{$client->city}}" class="form-control" id="city" name="city" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Estado</label>
                                <input type="text" value="{{$client->state}}"  class="form-control" id="state" name="state"  disabled>
                            </div>
                        </div>
                        <hr>
                        <a href="{{route('client.active', $client->id)}}" class="btn btn-primary mr-2" onclick="return confirm('Você tem certeza que deseja ACEITAR este cadastro?');">Aceitar</a>
                        <a href="{{ URL::previous() }}">Voltar</a>

                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">Check this custom checkbox</label>
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection