@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header elegant-color-dark">
                    <h2 class="text-center text-light font-weight-bold">Reporte</h2>
                </div>

                <div class="card-body">

                @include('custom.message')

                <div class="table-responsive">
                <table class="table table-striped">
                        <thead>
                            <tr class="text-center bg-dark text-white rounded-lg">
                                <div class="d-flex align-items-center">
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acceso Total</th>
                                    <th colspan="3"></th>
                                </div>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($reports as $report)
                                    <tr>
                                        <th scope="row">{{$report->expediente}}</th>
                                        <td>{{$report->producto}}</td>
                                        <td>{{$report->titular}}</td>
                                        <td>{{$report->registrosanitario}}</td>
                                        <td>{{$report->fechaexpedicion}}</td>
                                        <td>{{$report->fechavencimiento}}</td>
                                        <td>{{$report->estadoregistro}}</td>
                                        <td>{{$report->expedientecum}}</td>
                                        <td>{{$report->consecutivocum}}</td>
                                        <td>{{$report->cantidadcum}}</td>
                                        <td>{{$report->descripcioncomercial}}</td>
                                        <td>{{$report->estadocum}}</td>
                                        <td>{{$report->fechaactivo}}</td>
                                        <td>{{$report->fechainactivo}}</td>
                                        <td>{{$report->muestramedica}}</td>
                                        <td>{{$report->unidad}}</td>
                                        <td>{{$report->atc}}</td>
                                        <td>{{$report->descripcionatc}}</td>
                                        <td>{{$report->viaadministracion}}</td>
                                        <td>{{$report->concentracion}}</td>
                                        <td>{{$report->principioactivo}}</td>
                                        <td>{{$report->unidadmedida}}</td>
                                        <td>{{$report->cantidad}}</td>
                                        <td>{{$report->unidadreferencia}}</td>
                                        <td>{{$report->formafarmaceutica}}</td>
                                        <td>{{$report->nombrerol}}</td>
                                        <td>{{$report->tiporol}}</td>
                                        <td>{{$report->modalidad}}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>

                </div>
                    {{$reports->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection