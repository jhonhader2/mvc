<?php

class Consulta extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->alumnos = $this->model->get();
        $this->view->render('consulta/index');
    }

    public function show($params = null)
    {
        $id = $params[0];
        $alumno = $this->model->getById($id);

        $this->view->alumno = $alumno;
        $this->view->render('consulta/show');
    }

    public function update()
    {
        $id = $_POST['id'];

        $data = [
            'id'        => $_POST['id'],
            'nombres'   => $_POST['nombres'],
            'apellidos' => $_POST['apellidos'],
        ];

        $result = $this->model->update($data);
        $alumno = $this->model->getById($id);

        if ($result) {
            $this->view->mensaje = "El alumno se ha actualizado correctamente";
        } else {
            $this->view->mensaje = "El alumno no se ha actualizado";
        }

        $this->view->alumno = $alumno;
        $this->view->render('consulta/show');
    }

    public function destroy($params = null)
    {
        $id = $params[0];

        $result = $this->model->destroy($id);
        if ($result) {
            $this->view->mensaje = "El alumno se ha eliminado correctamente";
        } else {
            $this->view->mensaje = "El alumno no se ha eliminado";
        }
        $this->view->alumnos = $this->model->get();
        $this->view->render('consulta/index');
    }
}
