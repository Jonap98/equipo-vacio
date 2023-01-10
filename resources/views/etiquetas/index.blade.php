@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style media="print">
        #etiqueta {
            font-family: Impact, 'Arial Narrow Bold';
            font-size: 10rem;
            color: #000;
        }
    </style>
    <style>
        #etiqueta {
            color: #000;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-contnet-center">
            <div id="area-imprimible" class="col-md-12">
                <div class="d-flex justify-content-between">
                    <H5>Etiquetas Equipo Vacío</H5>
                    <button class="btn btn-primary" onclick="imprimir()">
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
                        <span>Turno</span>
                        <select class="form-select" name="turno" id="turno" onchange="cambiarTurno(value)">
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <span>Número de parte</span>
                        <select class="form-select" name="num_parte" id="num_parte" onchange="selectNumber(value)">
                            @foreach ($empaques as $empaque)
                                <option class="form-control" value="{{ $empaque }}">{{ $empaque->numero_de_parte }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="container d-flex justify-content-center">

                        <div id="padrote" class="row g-2">

                            <div id="barcode-card" class="col-md-9 p-2">
                                
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js" integrity="sha512-QEAheCz+x/VkKtxeGoDq6nsGyzTx/0LMINTgQjqZ0h3+NjP+bCsPYz3hn0HnBkGmkIFSr7QcEZT+KyEM7lbLPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            let isGenerated = false;
            const selectNumber = (number) => {
                isGenerated = true;

                if(isGenerated) {
                    const padre = document.getElementById('barcode-card');
                    padre.innerHTML = '';
                }

                const turno = document.getElementById('turno');
                
                const obj = JSON.parse(number);                

                const barcodeCard = document.getElementById('barcode-card');

                

                // Construcción de la etiqueta
                const etiqueta = document.createElement('div');
                etiqueta.id = 'etiqueta';
                etiqueta.style = 'height: 4in; width: 6in; border-style: solid; border-radius: 10px; padding-left: 1rem; font-family: Impact';
                // etiqueta.style = 'height: 4in; width: 6in;';

                // Número de parte
                const partNumber = document.createElement('span');
                partNumber.style = 'font-size: 6rem; font-weight: 700; font-family: Impact';
                partNumber.innerText = obj.numero_de_parte;
                
                // Barcode
                const barcode = document.createElement('div');
                barcode.innerHTML = `<div><svg id="barcode"></svg></div>`
                


                // Descripción
                const descripcionDiv = document.createElement('div');
                
                const descripcionLabel = document.createElement('span');
                descripcionLabel.style = 'font-family: Impact';
                descripcionLabel.innerText = 'Desc:';

                const descripcionPart = document.createElement('span');
                descripcionPart.style = 'display: block; font-size: 2rem; font-family: Impact';
                descripcionPart.innerText = obj.descripcion;
                
                descripcionDiv.appendChild(descripcionLabel);
                descripcionDiv.appendChild(descripcionPart);

                // Turno y Std pack
                const singleRow = document.createElement('div');
                // singleRow.style = 'display: flex; justify-content: space-evenly';
                singleRow.style = 'display: flex;';
                
                const turnoDiv = document.createElement('div');
                turnoDiv.style = 'width: 2in; font-family: Impact'
                turnoDiv.innerText = 'Turno';
                const turnoPart = document.createElement('span');
                turnoPart.id = 'turnoSpan';
                turnoPart.style = 'display: block; font-size: 2rem; font-family: Impact'
                turnoPart.innerText = turno.value ?? 'A'; // turno según selección
                turnoDiv.appendChild(turnoPart);


                singleRow.appendChild(turnoDiv);

                const std = document.createElement('div');
                std.style = 'font-family: Impact';
                std.innerText = 'StdPk:';

                const stdCount = document.createElement('span');
                stdCount.style = 'font-size: 3rem; font-family: Impact'
                stdCount.innerText = obj.standar_pack;

                std.appendChild(stdCount);

                singleRow.appendChild(std);

                // Appends, en el mismo orden
                etiqueta.appendChild(partNumber);
                etiqueta.appendChild(barcode);
                // etiqueta.appendChild(bar);
                etiqueta.appendChild(descripcionDiv);
                etiqueta.appendChild(singleRow);

                barcodeCard.appendChild(etiqueta);

                JsBarcode("#barcode", obj.numero_de_parte, {
                    lineColor: "#000",
                    width: 4,
                    height: 40,
                    displayValue: false
                });
                
            }


            const imprimir = () => {
                
                const areaImprimible = document.getElementById('etiqueta');

                const w = window.open();
                w.document.write(areaImprimible.innerHTML);
                w.document.close();
                w.focus();
                w.print();
                w.close();

            }

            const cambiarTurno = (turno) => {
                if(isGenerated) {
                    const labelTurno = document.getElementById('turnoSpan');
                    labelTurno.innerText = turno;
                }
            }
        </script>
    @endsection
    
@endsection