<?php
require_once 'models/DataModel.php';

// Funkcja kontrolera do obsługi wyświetlania listy
function display_list() {
    $db = db_connect();
    $records = get_all_records($db);
    db_close($db);

    include 'views/list.php';
}

// Funkcja kontrolera do obsługi usuwania rekordu
function delete_record_action($id) {
    $db = db_connect();
    delete_record($db, $id);
    db_close($db);

    // Po usunięciu przekierowanie z powrotem na listę
    header('Location: index.php');
    exit;
}


function add_record_action($title, $author, $year, $genre, $shelf) {
    $db = db_connect();
    add_record($db, $title, $author, $year, $genre, $shelf);
    db_close($db);

    // Po dodaniu przekierowanie z powrotem na listę
    header('Location: index.php');
    exit;
}