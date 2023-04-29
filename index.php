
<?php 
session_start();
function dd($var) {
    echo '<pre>';
   print_r($var);
    echo '</pre>';
}

require_once('App/config/Autoload.php');

$autoload = new Autoload();
$autoload->addDirectories([
    __DIR__ . '/App/Router',
    __DIR__ . '/App/Controllers',
    __DIR__ . '/App/Controllers/Main',
    __DIR__ . '/App/Controllers/About',
    __DIR__ . '/App/DB',
    __DIR__ . '/App/Models',
    __DIR__ . '/App/Views',
]);
$autoload->register();

// Получаем сохраненные значения параметров из сессии
$category_id = $_SESSION['category_id'] ?? '';
$sort = $_SESSION['sort'] ?? '';



$router = new Router();
$router->addRoute('#^/\?$#', 'MainController', 'index');
$router->addRoute('#^/$#', 'MainController', 'index');
$router->addRoute('#^/\?category_id=(\d+)&sort=(\w+)$#', 'MainController', 'index');
$router->addRoute('#^/\?sort=(\w+)&category_id=(\d+)$#', 'MainController', 'index');
// $router->addRoute('#^/$#', 'MainController', 'index');
 $router->addRoute('#^/products/main\?category_id=(\d+)$#', 'MainController', 'getProductsByCategory');
$router->addRoute('#^/products/main/get$#', 'MainController', 'getProduct');
$router->handleRequest();
