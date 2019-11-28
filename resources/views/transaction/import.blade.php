@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-xl-12">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-file-excel"></i>
                    </div>
                    <div class="spur-card-title"> Importar Planilha </div>
                </div>
                <div class="card-body ">
                    <form method="POST" action="{{ route('transaction.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                             <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Importar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection