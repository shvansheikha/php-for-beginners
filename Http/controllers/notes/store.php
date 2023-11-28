<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required!';
}

if (!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => "Create note",
        'errors' => $errors,
    ]);

}
if (empty($errors)) {
    $db->query('insert into notes(body, user_id) values (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 6,
    ]);

    header('location: /notes');
    die();
}

