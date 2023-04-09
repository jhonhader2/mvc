<?php

class AlumnoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = '';
    }

    public function index()
    {
        $this->view->alumnos = $this->model->getAll();
        $this->view->render('alumno/index');
    }

    public function show($params = null)
    {
        $id = $params[0];
        $alumno = $this->model->getById($id);

        $this->view->alumno = $alumno;
        $this->view->render('alumno/show');
    }

    public function create()
    {
        $this->view->render('alumno/create');
    }

    public function store()
    {
        $mensaje    = '';
        $nombres    = $_POST['nombres'];
        $apellidos  = $_POST['apellidos'];

        $store = $this->model->store(['nombres' => $nombres, 'apellidos' => $apellidos]);

        if ($store) {
            $mensaje = 'Se ha creado el alumno';
        } else {
            $mensaje = 'Ha ocurrido un error al crear el alumno';
        }

        $this->view->mensaje = $mensaje;
        $this->view->alumnos = $this->model->getAll();
        $this->view->render('alumno/index');
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
        $this->view->render('alumno/show');
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
        $this->view->alumnos = $this->model->getAll();
        $this->view->render('alumno/index');
    }
}
