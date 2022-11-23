<?php

$router = new \Bramus\Router\Router();
 
 
$router->setNamespace('\App');
 
/**
 * Definimos nuestras rutas
 */
$router->get('/', function() { echo "Bienvenido a la API de películas"; });
$router->get('/libros', 'controllers\LibrosController@all');
$router->post('/libros', 'controllers\LibrosController@insert');
$router->get('/libros/(\d+)', 'controllers\LibrosController@find');
$router->put('/peliculas/(\d+)','controllers\LibrosController@update');
$router->delete('/peliculas/(\d+)','controllers\LibrosController@delete');
$router->set404('(/.*)?', function() {
    echo "Error 404, no se ha encontrado el recurso o a sido eliminado";
});
 
$router->run();