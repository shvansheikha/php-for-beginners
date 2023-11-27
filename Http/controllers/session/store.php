<?php

use Core\Authenticator;
use Core\Session;
use Request\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if ((new Authenticator())->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address!');
}

Session::flash('errors', $form->errors());

redirect('/session/show');


