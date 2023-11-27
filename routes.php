<?php

$router->get('/', 'index.php');
$router->get('/about', 'index.php');
$router->get('/contact', 'contact.php');

//notes
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/notes/show', 'notes/show.php');
$router->delete('/notes/note', 'notes/destroy.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes/store', 'notes/store.php');

$router->get('/auth/register', 'auth/signup.php')->only('guest');
$router->post('/auth/register', 'auth/store.php')->only('guest');

$router->get('/session/show', 'session/show.php')->only('guest');
$router->post('/session/store', 'session/store.php')->only('guest');
$router->delete('/session/destroy', 'session/destroy.php')->only('auth');
