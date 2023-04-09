<?php

class Nuevo extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = '';
    }

    public function render()
    {
        $this->view->render('nuevo/index');
    }

    public function registrar()
    {
        $mensaje = '';
        $nombres    = $_POST['nombres'];
        $apellidos  = $_POST['apellidos'];

        $store = $this->model->store(['nombres' => $nombres, 'apellidos' => $apellidos]);

        if ($store) {
            $mensaje = 'Se ha creado el alumno';
        } else {
            $mensaje = 'Ha ocurrido un error al crear el alumno';
        }

        $this->view->mensaje = $mensaje;
        $this->view->alumnos = $this->model->get();
        $this->view->render('consulta/index');
    }
}
