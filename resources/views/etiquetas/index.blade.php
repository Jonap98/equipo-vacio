@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-contnet-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <H5>Etiquetas Equipo Vacío</H5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSensor">
                        Imprimir
                    </button>
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
                <div class="d-flex justify-content-between mb-2">
                    <div class="col-md-3">
                        <span>Número de parte</span>
                        <select class="form-select" name="num_parte" id="num_parte" onchange="selectNumber(value)">
                            @foreach ($empaques as $empaque)
                                <option class="form-control" value="{{ $empaque }}">{{ $empaque->numero_de_parte }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="container">

                        <div class="row g-2">

                            <div class="card col-md-12 p-2">
                                {{-- <table id="sensores" class="table table-striped m-2">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sensor</th>
                                            <th scope="col">Número de parte</th>
                                            <th scope="col">Ubicación línea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sensores as $sensor)
                                            <tr>
                                                <td>{{ $sensor->sensor }}</td>
                                                <td>{{ $sensor->num_parte }}</td>
                                                <td>{{ $sensor->ubicacion_linea }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}
                                
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

        <script>
            const selectNumber = (number) => {
                const obj = JSON.parse(number);

                console.log(obj);
                console.log(obj.numero_de_parte);
                console.log(obj.descripcion);
                // console.log(JSON.parse(number));
                // console.log(JSON.parse(number.numero_de_parte));
                // console.log(number.numero_de_parte);
            }
        </script>
    @endsection
    
@endsection