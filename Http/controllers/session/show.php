<?php

view('session/show.view.php', [
    'errors' => $_SESSION['_flash']['errors'] ?? []
]);