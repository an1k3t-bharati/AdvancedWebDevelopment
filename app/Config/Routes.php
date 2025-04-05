<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\Users;
use App\Controllers\Products;
use App\Controllers\Contact;
use App\Controllers\About;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');


$routes->get('/contactus', 'Contact::index');
$routes->post('/contactus', 'Contact::submit');
$routes->get('about', 'About::index');
$routes->get('/news', 'News::index');

$routes->get('products/men', 'Products::men');
$routes->get('products/women', 'Products::women');
$routes->get('search', 'Products::search'); 

$routes->get('user/register', 'Users::register');
$routes->post('user/register', 'Users::processRegister');
$routes->get('user/login', 'Users::login');
$routes->post('user/login', 'Users::processLogin');
$routes->get('user/logout', 'Users::logout');

$routes->get('cart', 'Cart::index');
$routes->post('cart/add', 'Cart::add');
$routes->post('cart/remove', 'Cart::remove');
$routes->post('cart/ajaxAdd', 'Cart::ajaxAdd');
