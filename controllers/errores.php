<?php

class Errores extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('errores/index');
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la página";
    }
}
