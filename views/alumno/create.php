<?php require 'views/main/partials/header.php' ?>

<div id="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">Nuevo Alumno</h1>

                <form action="<?php echo constant('URL') ?>alumno/store" method="POST">
                    <div class="form-group">
                        <label for="nombres"><span>Nombres</span></label>
                        <input type="text" class="form-control" name="nombres" id="nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos"><span>Apellidos</span></label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require 'views/main/partials/footer.php' ?>