@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row dash-row">
        @if(auth()->user()->admin == false)
            <div class="col-6">
                <a href="{{route('user.profile')}}" class="btn btn-light">
                    <i class="fas fa-user-circle fa-5x"></i>
                    <h6>Meus Dados</h6>
                </a>
            </div>
            <div class="col-6">
                <a href="" class="btn btn-light">
                    <i class="fas fa-wrench fa-5x"></i>
                    <h6>Manutenção</h6>
                </a>
            </div>
            <div class="col-6 mt-4">
                <a href="" class="btn btn-light">
                    <i class="fas fa-calendar-alt fa-5x"></i>
                    <h6>Agendamento</h6>
                </a>
            </div>
            <div class="col-6 mt-4">
            <a href="{{route('car.show', auth()->user()->car['id'])}}" class="btn btn-light">
                    <i class="fas fa-history fa-5x"></i>
                    <h6>Histórico</h6>
                </a>
            </div>
        </div>
        @endif
        {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="card spur-card">
                        <div class="card-header bg-warning text-dark">
                            <div class="spur-card-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="spur-card-title"> Warning Card </div>
                            <div class="spur-card-menu">
                                <div class="dropdown">
                                    <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(30px, 30px, 0px);">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-warning text-dark"> Just a card that can be used to display some content, graphs, tables, and so on. </div>
                    </div>
                </div>
            </div> --}}
    </div>

@endsection
