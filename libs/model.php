<?php

class Model extends stdClass {
    function __construct(){
        $this->db = new Database();
    }
}