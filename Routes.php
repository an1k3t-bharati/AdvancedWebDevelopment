<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\News;
use App\Controllers\Users;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('news', [News::class, 'index']); 
$routes->get('news/(:segment)', [News::class, 'show']);
$routes->get('(:segment)', [Pages::class, 'view']); // Move this line to the bottom


$routes->get('user/login/(:segment)',[Users::class,'login']);
$routes->get('user/logout/', [Users::class,'logout']);