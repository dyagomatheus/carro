@extends('layouts.app')

@section('content')
<div class="row">
        <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
         Adicionar Novo
        </button>
        <div class="col-xl-12">
                <div class="collapse" id="collapseExample">
                        <div class="card card-body mb-2">
                                <div class="card spur-card">
                                        <div class="card-header">
                                            <div class="spur-card-icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="spur-card-title"> Cadastro de Usuário </div>
                                        </div>
                                        <div class="card-body ">
                                            <form method="POST" action="{{ route('user.add.store') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a Senha') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Register') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                    </div>
                <div class="card spur-card">
                        <div class="card-header">
                            <div class="spur-card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="spur-card-title">Lista de Usuários</div>
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

        </div>
@endsection