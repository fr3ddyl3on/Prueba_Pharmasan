@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header elegant-color-dark">
                    <h2 class="text-center text-light font-weight-bold">Lista de Clientes</h2>
                </div>

                <div class="card-body">
                @can('haveaccess','Createclient.create')
                    <a href="{{route('client.create')}}" class="btn btn-outline-success btn-lg float-right rounded-pill waves-effect btn-sm" title="Crear"><i class="fas fa-user-plus" placeholder="Crear"></i></a><br><br> 
                @endcan
                @include('custom.message')

                <div class="table-responsive">
                <table class="table table-striped">
                        <thead>
                            <tr class="text-center bg-dark text-white rounded-lg">
                                <div class="d-flex align-items-center">
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Dirección</th>
                                    <th colspan="3"></th>
                                </div>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($clients as $client)
                                    <tr>
                                        <th scope="row">{{$client->id}}</th>
                                        <td>{{$client->nombre}}</td>
                                        <td>{{$client->documento}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->direccion}}</td>
                                        <td>
                                            @can('haveaccess','editclient.edit')
                                                <a class="btn btn-outline-warning rounded-pill waves-effect btn-sm" title="Editar" href="{{route('client.edit',$client->id)}}"><i class="fas fa-user-edit"></i>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess','deletclient.destroy')
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
                    {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" client="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{route('client.destroy', $client->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger rounded-pill waves-effect btn-sm">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
</div>