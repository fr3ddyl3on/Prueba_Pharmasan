@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color-dark">
                    <h2 class="text-center text-light font-weight-bold">Creación de clientes</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('client.store')}}" method="POST">
                    @csrf
                    
                    
                        <div class="container">
                        
                        <h3>Datos Requeridos</h3>

                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{old('nombre')}}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="documento" placeholder="Documento" name="documento" value="{{old('documento')}}"> 
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}"> 
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="direccion" placeholder="Direccion" name="direccion" value="{{old('direccion')}}"> 
                            </div>

                            <hr>
                                                       
                            <button type="submit" class="btn btn-outline-success btn-lg float-right rounded-pill waves-effect btn-sm"><i class="fas fa-save"></i></button>
                            <a class="btn btn-outline-dark btn-lg float-right mr-3 rounded-pill waves-effect btn-sm" title="Atras" href="{{route('client.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
                            
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
