 <?php
require_once 'libs/autoloader.php';

use UNLu\PAW\Libs\Configuracion;
use UNLu\PAW\Libs\Despachador;
use UNLu\PAW\Libs\Router;

$router = new Router();
$despachador = new Despachador($router);
$configuracion = new Configuracion(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'app.php');
$rutaPorDefecto = $configuracion->getConfiguracion('Router.accionPorDefecto');
if(!is_null($rutaPorDefecto)){
    $router->setRutaPorDefecto($rutaPorDefecto);
}
$despachador->desapchar($_SERVER);


