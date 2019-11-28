<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/spur.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="{{asset('/js/chart-js-config.js')}}"></script>
    <title>Carro Certo</title>
</head>

<body>
<!-- início do preloader -->
<div id="preloader">
        <div class="inner">
           <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
           <div class="bolas">
              <div></div>
              <div></div>
              <div></div>                    
           </div>
        </div>
    </div>
    <!-- fim do preloader --> 
    <div class="dash bg-light">
        <div class="dash-nav" style="background: #EC0000; color: #fff;">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="http://carrocerto.com.br" target="_blank" class="spur-logo logo-link">
                <img src="{{asset('img/logo.png')}}" style="width: 142px; height: auto;" alt="LGO" class="justify-content-center">
                    {{-- <h4>CARRO CERTO</h4>     --}}
                </a> 
            </header>
            <nav class="dash-nav-list">
                <a href="{{route('home')}}" class="dash-nav-item">
                    <i class="fas fa-home"></i> Menu Principal
                </a>
                <a href="{{route('user.profile')}}" class="dash-nav-item">
                        <i class="fas fa-user-circle"></i> Meus Dados
                </a>
                @if(auth()->user()->admin == true)
                <a href="{{route('user.index')}}" class="dash-nav-item">
                    <i class="fas fa-users"></i> Usuários
                </a>

                <a href="{{route('client.index')}}" class="dash-nav-item">
                    <i class="fas fa-store"></i> Clientes
                </a>
                <a href="{{route('car.index')}}" class="dash-nav-item">
                    <i class="fas fa-car"></i> Veículos
                </a>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-hand-holding-usd"></i> Lançamentos </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="{{route('transaction.create')}}" class="dash-nav-dropdown-item">Vendas</a>
                        <a href="{{route('transaction.debit')}}" class="dash-nav-dropdown-item">Débito</a>
                    </div>
                </div>
                @else
                <a href="" class="dash-nav-item">
                        <i class="fas fa-hands-helping"></i> Avalie o App
                    </a>
                    <a href="" class="dash-nav-item">
                        <i class="fas fa-info-circle"></i> Institucional
                    </a>
                    <a href="" class="dash-nav-item">
                        <i class="fas fa-info-circle"></i> Termos de Uso
                    </a>
                    <a href="" class="dash-nav-item">
                        <i class="fas fa-user-shield"></i> Politica de Privacidade
                    </a>
                    <a href="" class="dash-nav-item">
                        <i class="fas fa-question-circle"></i> Solicite Suporte
                    </a>
                @endif
                <a class="dash-nav-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>
                
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            </nav>
        </div>
        <div class="dash-app bg-light">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>    
            </header>
            <main class="dash-content bg-light">
                <div class="container-fluid bg-light">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @if(session('success'))
    <!-- Modal -->
    <div class="modal" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="modalSuccessLabel"><i class="far fa-laugh-beam"></i> Tudo Certo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                {{session('success')}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
        </div>
    </div>
    </div>
    @endif

    @if(session('fail'))
    <!-- Modal -->
    <div class="modal" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="modalSuccessLabel"><i class="fas fa-frown"></i> Opa!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                {{session('fail')}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
        </div>
    </div>
    </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('/js/spur.js')}}"></script>
     <script>
    //código usando jQuery
    $(document).ready(function() {
        $('#preloader').hide();
    });

    $(document).ready(function() {
    $('#modalSuccess').modal('show');
    })
 </script>
</body>

</html>