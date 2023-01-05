<div class="modal fade" id="modalSensor" tabindex="-1" aria-labelledby="modalSensor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('empaques.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Agregar empaque</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">

                    <div class="m-2">
                        <label class="d-block" for="">Número de parte</label>
                        <input type="text" id="numero_de_parte" name="numero_de_parte" class="form-control">
                    </div>

                    <div class="m-2">
                        <label class="d-block" for="">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control">
                    </div>

                    <div class="m-2">
                        <label class="d-block" for="">Standar pack</label>
                        <input type="number" id="standar_pack" name="standar_pack" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>