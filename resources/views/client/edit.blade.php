@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color-dark">
                    <h2 class="text-center text-light font-weight-bold">Edición de Clientes</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('client.update',$client->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    
                        <div class="container">
                        
                        <h3>Datos Requeridos</h3>

                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{old('nombre', $client->nombre)}}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="documento" placeholder="Documento" name="documento" value="{{old('documento', $client->documento)}}"> 
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email', $client->email)}}"> 
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" value="{{old('direccion', $client->direccion)}}"> 
                            </div>

                            <hr>

                            
                            <button type="submit" class="btn btn-outline-success btn-lg float-right rounded-pill waves-effect btn-sm" title="Guardar"><i class="fas fa-save"></i></button>
                            <a class="btn btn-outline-dark btn-lg float-right mr-3 rounded-pill waves-effect btn-sm" title="Atras" href="{{route('client.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
                            
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
