@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="spur-card-title"> Cadastro de Cliente </div>
                </div>
                <div class="card-body ">
                    <form action="{{route('client.store')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nome Social</label>
                                <input type="text" class="form-control" id="social_name" placeholder="Nome Social" name="social_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nome Fantasia</label>
                                <input type="text" class="form-control" id="fantasy_name" placeholder="Nome Fantasia" name="fantasy_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">CNPJ</label>
                                <input type="number" maxlength="11" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Código</label>
                                <input type="text"  class="form-control" id="code" placeholder="Código" name="code">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Telefone</label>
                                <input type="number" class="form-control" id="telephone" placeholder="(99) 9 9999-9999" name="telephone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">CEP</label>
                                <input type="number"  class="form-control" id="zipcode" placeholder="000000-000" name="zipcode">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="inputEmail4">Rua</label>
                                <input type="text"class="form-control" id="street" placeholder="Rua Padre Uchôa" name="street">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">Número</label>
                                <input type="text"  class="form-control" id="number" placeholder="123" name="number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Complemento</label>
                                <input type="text"class="form-control" id="complement" placeholder="Prox. Padaria" name="complement">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Bairro</label>
                                <input type="text"  class="form-control" id="district" placeholder="Centro" name="district">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Cidade</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Floriano">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Estado</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="Piauí">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Responsável</label>
                                <input type="text" class="form-control" id="responsible" name="responsible" placeholder="Nome completo">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Inscrição Estadual</label>
                                <input type="text" class="form-control" id="state_registration" name="state_registration" placeholder="Inscrição SEFAZ">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">Check this custom checkbox</label>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection