<?php require 'views/main/partials/header.php' ?>

<div id="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">Alumnos Inscritos</h1>
                
                <?php
                if ($this->mensaje) :
                ?>
                    <div class="alert alert-success" role="alert">
                        <span><?= $this->mensaje ?></span>
                    </div>
                <?php
                endif
                ?>

                <div class="my-3">
                    <a class="btn btn-sm btn-outline-primary" href="<?= constant('URL') ?>alumno/create">Nuevo</a>
                </div>

                <table class="table table-sm table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($this->alumnos) {
                            foreach ($this->alumnos as $row) {
                        ?>
                                <tr class="text-center">
                                    <td><?= $row->nombres ?></td>
                                    <td><?= $row->apellidos ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info" href="<?= constant('URL') . "alumno/show/" . $row->id ?>">Actualizar</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-danger" href="<?= constant('URL') . "alumno/destroy/" . $row->id ?>"">Eliminar</a> 
                                </td>
                            </tr>
                            <?php
                            }
                        } else {
                            ?>
                        <tr class=" text-center">
                                    <td colspan="4">Sin datos</td>
                                </tr>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require 'views/main/partials/footer.php' ?>