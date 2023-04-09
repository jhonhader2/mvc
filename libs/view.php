<?php

class View
{
    public $mensaje = '';
    
    function __construct()
    {
        $this->mensaje = null;
    }

    public function render($nombre)
    {
        include 'views/' . $nombre . '.php';
    }
}
