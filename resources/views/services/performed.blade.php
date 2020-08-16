@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-user"></i>
                    </div>
                  <div class="spur-card-title"> Cadastro de Serviço</div>

                </div>
                <div class="card-body">
                  <h5>Veículo</h5>
                  <p><strong>Chassi:</strong> {{$car->chassis}} - <strong> Modelo:</strong> {{$car->model}} - <strong>Cor:</strong> {{$car->color}}</p>
                  <hr>
                    <form action="{{route('service.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                          <div class="form-group col-md-5">
                            <label for="inputEmail4">KM Atual</label>
                            <input type="number" class="form-control" id="current_km" placeholder="KM Atual do Veículo" name="current_km">
                          </div>
                        </div>
                        <input type="number" hidden value="{{$car->id}}" name="car_id">
                        <h5 class="mb-4">Serviços realizados</h5>
                        <div id="form">
                          <table class="table table-hover table-in-card">
                            <tbody>
                                <tr>
                                    <td>
                                      <div class="row mb-3">
                                        <div class="form-group col-md-2">
                                          <label for="inputEmail4">Serviço</label>
                                          <input type="text" class="form-control" id="service" placeholder="Descrição do serviço" name="service[]">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="inputEmail4">Marca</label>
                                          <input type="text" class="form-control" id="brand" placeholder="Marca" name="brand[]">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <label for="inputEmail4">Garantia (somente números)</label>
                                          <input type="text" class="form-control" id="warranty" placeholder="Inserir quantidade de meses" name="warranty[]">
                                        </div>
                                        <div class="form-group col-md-3">
                                          <label for="inputEmail4">KM Retorno</label>
                                          <input type="number" class="form-control" id="return_km" placeholder="Apenas números" name="return_km[]">
                                        </div>
                                      </div>
                                      
                                      </td>
                                    <td>
                                      <button type="button" class="btn btn-success mt-4" onclick="duplicarCampos()">Adicionar</button>
                                      <button type="button" class="btn btn-danger mt-4" onclick="removerCampos()">Remover</button>
                                    </td>
                                </tr>  
                            </tbody>
                        </table>
                        </div>
                        <div id="destino">
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
<script>
  function duplicarCampos(){
    var clone = document.getElementById('form').cloneNode(true);
    var destino = document.getElementById('destino');
    destino.appendChild (clone);
    
    var camposClonados = clone.getElementsByTagName('input');
    
    for(i=0; i<camposClonados.length;i++){
      camposClonados[i].value = '';
    }
    
    
    
  }

  function removerCampos(id){
    var node1 = document.getElementById('destino');
    node1.removeChild(node1.childNodes[0]);
  }

</script>