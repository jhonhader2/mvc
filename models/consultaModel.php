<?php

include_once 'models/alumnoModel.php';

class consultaModel extends Model
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

    public function getById($id)
    {

        try {
            $sql  = 'SELECT * FROM personas WHERE id = :id';
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                'id' => $id
            ]);

            while ($row = $query->fetch()) {
                $item = new AlumnoModel;
                $item->id           = $row['id'];
                $item->nombres      = $row['nombres'];
                $item->apellidos    = $row['apellidos'];
            }

            return $item;
        } catch (PDOException $e) {
            return ['mensaje' => $e];
        }
    }

    public function update($datos)
    {
        try {
            $sql = 'UPDATE personas SET nombres = :nombres, apellidos = :apellidos WHERE id = :id';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id'        => $datos['id'],
                'nombres'   => $datos['nombres'],
                'apellidos' => $datos['apellidos'],
            ]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $sql = 'DELETE FROM personas WHERE id = :id';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id'        => $id
            ]);

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
