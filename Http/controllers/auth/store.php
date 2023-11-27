<?php

use Core\App;
use Core\Database;
use Core\Validator;

$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];

if (Validator::email($email)) {
    $errors['email'] = 'please provide a valid email address.';
}

if (Validator::string($password, 5, 255)) {
    $errors['password'] = 'password should be at least 5 characters.';
}

if (count($errors)) {
    view('auth/register.view.php', ['errors' => $errors]);

    exit();
} else {
    $db = App::resolve(Database::class);

    $user = $db->query('select * from users where email = :email', ['email' => $email])->find();

    if ($user) {
        header('location: / ');
        exit();
    }

    $db->query('insert into users(email, password) values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: / ');
    exit();
}

