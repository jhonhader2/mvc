<?php

class AyudaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('ayuda/index');
    }
}
