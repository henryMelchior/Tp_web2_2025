<!-- formulario de alta de pago -->
<form action="guardar" method="POST" class="my-4">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Deudor</label>
                <input required name="deudor" type="text" class="form-control" placeholder="Nombre del deudor">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Cuota</label>
                <input required name="cuota" type="number" class="form-control" min="1" placeholder="N°">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Monto</label>
                <input required name="cuota_capital" type="number" step="0.01" class="form-control" placeholder="$">
            </div>
        </div>
    </div>

    <div class="form-group mt-3">
        <label>Fecha de Pago</label>
        <input required name="fecha_pago" type="date" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
</form>