<div class="contenedor">
    <!-- Formulario -->
    <div class="bloque formulario">
        <?php require 'materia_form.php'; ?>
    </div>

    <!-- Lista -->
    <div class="bloque lista">
        <ul class="list-group">
            <?php foreach ($materias as $materia): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <b><?= htmlspecialchars($materia->nombre) ?></b> 
                        | Profesor <?= $materia->profesor ?> 
                    </div>
                    <div>
                        <a class="btn btn-sm btn-danger" href="eliminar/<?= $materia->id ?>">ELIMINAR</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

