<div class="row">
    <!-- Columna izquierda: formulario de alta -->
    <div class="col-md-4">
        <div class="card px-4 py-3">
            <?php require 'pagos_form.php'; ?>
        </div>
    </div>

    <!-- Columna derecha: listado de pagos -->
    <div class="col-md-8">
        <ul class="list-group">
            <?php foreach ($pagos as $pago): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <b><?= htmlspecialchars($pago->deudor) ?></b> 
                        | Cuota <?= $pago->cuota ?> 
                        | $<?= number_format($pago->cuota_capital, 2) ?> 
                        | <?= $pago->fecha_pago ?>
                    </div>
                    <div>
                       <a class="btn btn-sm btn-danger" href="eliminar/<?= $pago->id ?>">ELIMINAR</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
