@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color-dark">
                    <h2 class="text-center text-light font-weight-bold">Vista de Roles</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('role.update',$role->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    
                        <div class="container">
                        
                        <h3>Datos Requeridos</h3>

                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{old('nombre', $role->nombre)}}" readonly>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{old('slug', $role->slug)}}" readonly> 
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" rows="3" readonly>{{old('descripcion', $role->descripcion)}}</textarea>
                            </div>

                            <hr>

                            <h3>Acceso Total</h3>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="si" 
                                @if($role['full-access']=="si")
                                    checked
                                @elseif(old('full-access')=="si")
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input disabled type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"
                                @if($role['full-access']=="no")
                                    checked
                                @elseif(old('full-access')=="no")
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>

                            <hr>

                            <h3>Lista de Permisos</h3>
                            
                            @foreach($permissions as $permission)
                            <div class="custom-control custom-checkbox">
                                <input disabled type="checkbox" class="custom-control-input" id="permission_{{$permission->id}}" value="{{$permission->id}}" name="permission[]" 
                                @if(is_array(old('permission')) && in_array("$permission->id", old ('permission'))) 
                                    checked 
                                @elseif(is_array($permission_role) && in_array("$permission->id", $permission_role)) 
                                    checked 
                                @endif>
                                <label class="custom-control-label" for="permission_{{$permission->id}}">{{$permission->id}} - {{$permission->nombre}} <em>({{$permission->descripcion}})</em></label>
                            </div>
                            @endforeach
                            <hr>
                            @can('haveaccess','role.edit')
                                <a class="btn btn-outline-warning btn-lg float-right rounded-pill waves-effect btn-sm" title="Editar" href="{{route('role.edit',$role->id)}}"><i class="fas fa-user-edit"></i></a>
                            @endcan
                            <a class="btn btn-outline-dark btn-lg float-right mr-3 rounded-pill waves-effect btn-sm" title="Atras" href="{{route('role.index')}}"><i class="fas fa-arrow-circle-left"></i></a>
                                                        
                            <!-- <i class="fas fa-save"></i> -->
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
