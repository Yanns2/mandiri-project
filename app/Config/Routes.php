<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Komik;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

$routes->get('/komik/(:any)', [Komik::class, 'detail']);
$routes->get('/komik/edit/(:any)', 'Komik::edit/$1');
$routes->delete('/komik/delete/(:any)', 'Komik::delete/$1');
$routes->get('/createKomik', [Komik::class, 'create']);

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');

$routes->get('/login', 'Auth::register');
$routes->post('/login', 'Auth::register');


//$routes->get('/coba/about', 'Coba::about');
//$routes->get('/coba/(:any)/(:any)/(:num)', 'Coba::about/$1/$2/$3');
/*$routes->get('/coba/index', 'Coba::index');
$routes->get('/users', 'Admin\Users::index');
$routes->get('/baru', function () {
    echo 'hello world';
});
*/