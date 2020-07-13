@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color-dark">
                    <h2 class="text-center text-light font-weight-bold">Lista de Usuarios
                </div>

                <div class="card-body">
                <br><br> 
                @include('custom.message')

                <div class="table-responsive">
                    <!--Table-->
                    <div class="container">
                        <input class="form-control mb-4" id="tableSearch" type="text"
                            placeholder="Buscar elementos de la lista">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center bg-dark text-white rounded-lg">
                                    <div class="d-flex align-items-center">
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Rol</th>
                                        <th colspan="4"></th>
                                    </div>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @isset($user->roles[0]->nombre)
                                            {{$user->roles[0]->nombre}}
                                        @endisset
                                    </td>
                                    <td>
                                        @can('view',[$user,['user.show','userown.show']])
                                            <a class="btn btn-outline-primary rounded-pill waves-effect btn-sm" title="Ver" href="{{route('user.show',$user->id)}}"><i class="fas fa-user-shield"></i>
                                        @endcan 
                                        </td>
                                    
                                    <td>
                                        @can('view',[$user,['user.edit','userown.edit']])
                                            <a class="btn btn-outline-warning rounded-pill waves-effect btn-sm" title="Editar" href="{{route('user.edit',$user->id)}}"><i class="fas fa-user-edit"></i>
                                        @endcan    
                                    </td>
                                    <td>
                                        @can('haveaccess','user.destroy')
                                            <button class="btn btn-outline-danger mt-0 rounded-pill waves-effect btn-sm" title="Eliminar" type="button" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-user-times"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    <!--Table-->
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" user="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pharmasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-grey rounded-pill waves-effect btn-sm" data-dismiss="modal">Cerrar</button>
        <form action="{{route('user.destroy',$user->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger rounded-pill waves-effect btn-sm">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
</div>
