<?php require 'views/main/partials/header.php' ?>

<div id="main">
    <h1 class="center">Alumnos Inscritos</h1>

    <div class="center">
        <span><?= $this->mensaje ?></span>
    </div>

    <table width="100%" border="1px">
        <thead>
            <tr align="center">
                <td>Nombres</td>
                <td>Apellidos</td>
                <td colspan="2">Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($this->alumnos) {
                foreach ($this->alumnos as $row) {
            ?>
                    <tr>
                        <td><?= $row->nombres ?></td>
                        <td><?= $row->apellidos ?></td>
                        <td align="center">
                            <a href="<?= constant('URL') . "alumno/show/" . $row->id ?>">Actualizar</a>
                        </td>
                        <td align="center">
                            <a href="<?= constant('URL') . "alumno/destroy/" . $row->id ?>"">Eliminar</a> 
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr align=" center">
                        <td colspan="4">Sin datos</td>
                    </tr>
                <?php
            }
                ?>
        </tbody>
    </table>
    <br>
    <a href="<?= constant('URL') ?>alumno/create">Nuevo</a>
</div>

<?php require 'views/main/partials/footer.php' ?>