@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-contnet-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <H5>Empaques</H5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSensor">
                        Agregar empaque
                    </button>
                    @include('empaques.create')
                </div>
                <hr>
                @if(session('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between">

                </div>

                <div class="container">

                        <div class="row g-2">

                            <div class="card col-md-12 p-2">
                                <table id="sensores" class="table table-striped m-2">
                                    <thead>
                                        <tr>
                                            <th scope="col">Número de parte</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Standar pack</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empaques as $empaque)
                                            <tr>
                                                <td>{{ $empaque->numero_de_parte }}</td>
                                                <td>{{ $empaque->descripcion }}</td>
                                                <td>{{ $empaque->standar_pack }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#sensores').DataTable({
                    columnDefs: [
                        { orderable: false }
                    ]
                });
            });
        </script>
    @endsection
    
@endsection