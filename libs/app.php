<?php

require_once 'controllers/erroresController.php';

class App
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //Sin definir controller
        if (empty($url[0])) {
            $arhivoController = 'controllers/mainController.php';
            require_once $arhivoController;
            $controller = new MainController();
            $controller->loadModel('main');
            $controller->render();

            return false;
        }

        $arhivoController = 'controllers/' . $url[0] . 'Controller.php';

        if (file_exists($arhivoController)) {
            require_once $arhivoController;
            $class = $url[0] . 'Controller';

            $controller = new $class;
            $model      = $url[0];

            // var_dump($model);
            $controller->loadModel($model);

            #elementos de url
            $nparams = sizeof($url);

            if ($nparams >= 2) {
                if ($nparams >= 3) {
                    $params = [];
                    for ($i = 2; $i < $nparams; $i++) {
                        array_push($params, $url[$i]);
                    }
                    $controller->{$url[1]}($params);
                } else {
                    $controller->{$url[1]}();
                }
            } else {
                $controller->index();
            }
        } else {
            $controller = new ErroresController();
            $controller->index();
        }
    }
}
