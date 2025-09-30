<!-- Formulario de alta de pago -->
<form action="guardar" method="POST" class="my-4 p-4 border rounded shadow-sm bg-light">
    <div class="row g-3"> <!-- g-3 agrega espacio entre columnas -->
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input required name="nombre" type="text" id="nombre" class="form-control" placeholder="Nombre del deudor">
        </div>

        <div class="col-md-6">
            <label for="profesor" class="form-label">Profesor</label>
            <input required name="profesor" type="text" id="profesor" class="form-control" placeholder="Nombre del profesor">
        </div>
    </div>

    <!-- Botones uno al lado del otro -->
    <div class="mt-4 d-flex gap-2">
        <button type="submit" name="accion" value="guardar" class="btn btn-success flex-fill">Guardar</button>
        <button type="submit" name="accion" value="modificar" class="btn btn-warning flex-fill">Modificar</button>
    </div>
</form>
