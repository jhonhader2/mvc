<?php require 'views/main/partials/header.php' ?>

<div id="main">
    <h1 class="center">Edición de Alumno</h1>
    <h2 class="center"><?= $this->alumno->nombres . " " . $this->alumno->apellidos ?></h2>

    <div class="center">
        <span><?= $this->mensaje ?></span>
    </div>

    <form action="<?php echo constant('URL') ?>alumno/update" method="POST">
        <fieldset>
            <legend>Formulario</legend>
            <input type="hidden" name="id" value="<?= $this->alumno->id ?>">
            <label for="nombres">
                <span>Nombres</span>
                <input type="text" name="nombres" id="nombres" value="<?= $this->alumno->nombres ?>" required>
            </label><br><br>
            <label for="apellidos">
                <span>Apellidos</span>
                <input type="text" name="apellidos" id="apellidos" value="<?= $this->alumno->apellidos ?>" required>
            </label><br><br>
            <input type="submit" value="Actualizar">
        </fieldset>
    </form>
</div>

<?php require 'views/main/partials/footer.php' ?>