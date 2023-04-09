<?php

class ErroresController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la página";
        $this->view->render('errores/index');
    }
}
