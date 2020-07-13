@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color-dark">
                    <h2 class="text-center text-light font-weight-bold">Edición de Usuarios</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    
                        <div class="container">
                        
                        <h3>Datos Requeridos</h3>

                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{old('name', $user->name)}}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="Slug" name="email" value="{{old('email', $user->email)}}"> 
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="roles" id="roles">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}"
                                            @isset($user->roles[0]->nombre)
                                                @if($role->nombre == $user->roles[0]->nombre)
                                                    selected
                                                @endif
                                            @endisset
                                        >{{$role->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <hr>
                            
                            <button type="submit" class="btn btn-outline-success btn-lg float-right rounded-pill waves-effect btn-sm" title="Guardar"><i class="fas fa-save"></i></button>
                            <a class="btn btn-outline-dark btn-lg float-right mr-3 rounded-pill waves-effect btn-sm" title="Atras" href="{{route('user.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
                                                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
