<?php

include_once 'models/alumnoModel.php';

class NuevoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM personas ORDER BY nombres';

            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item            = new AlumnoModel();
                $item->id        = $row['id'];
                $item->nombres   = $row['nombres'];
                $item->apellidos = $row['apellidos'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return ['mensaje' => $e];
        }
    }

    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO personas(nombres,apellidos) VALUES(:nombres, :apellidos)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'nombres'   => $datos['nombres'],
                'apellidos' => $datos['apellidos'],
            ]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
