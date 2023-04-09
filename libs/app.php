<?php

require_once 'controllers/errores.php';

class App
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //Sin definir controller
        if (empty($url[0])) {
            $arhivoController = 'controllers/main.php';
            require_once $arhivoController;
            $controller = new Main();
            $controller->render();
            $controller->loadModel('main');
            return false;
        }

        $arhivoController = 'controllers/' . $url[0] . '.php';

        if (file_exists($arhivoController)) {
            require_once $arhivoController;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            #elementos de url
            $nparams = sizeof($url);

            if ($nparams > 1) {
                if ($nparams > 2) {
                    $params = [];
                    for ($i = 2; $i < $nparams; $i++) {
                        array_push($params, $url[$i]);
                    }
                    $controller->{$url[1]}($params);
                } else {
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }
        } else {
            $controller = new Errores();
        }
    }
}
