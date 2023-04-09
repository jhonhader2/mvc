<?php require 'views/main/partials/header.php' ?>

<div id="main">
    <h1 class="center">Sección de Nuevo</h1>

    <div class="center">
        <span><?= $this->mensaje ?></span>
    </div>

    <form action="<?php echo constant('URL') ?>nuevo/registrar" method="POST">
        <fieldset>
            <legend>Formulario</legend>
            <label for="nombres">
                <span>Nombres</span>
                <input type="text" name="nombres" id="nombres" required>
            </label><br><br>
            <label for="apellidos">
                <span>Apellidos</span>
                <input type="text" name="apellidos" id="apellidos" required>
            </label><br><br>
            <input type="submit" value="Guardar">
        </fieldset>
    </form>
</div>

<?php require 'views/main/partials/footer.php' ?>