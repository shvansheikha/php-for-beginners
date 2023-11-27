<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', ['id' => $_GET['id']]);

    header('location: /notes');

    exit();

} else {
    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view('notes/show.view.php', [
        'heading' => "Note",
        'note' => $note
    ]);
}