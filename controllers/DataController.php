<?php
require_once 'models/DataModel.php';

// Funkcja kontrolera do obsługi wyświetlania listy
function display_list()
{
    $db = db_connect();
    $records = get_all_records($db);
    db_close($db);

    include 'views/list.php';
}

// Funkcja kontrolera do obsługi edycji rekordu
function display_edit_form($id)
{
    $db = db_connect();
    $record = get_record_by_id($db, $id);
    db_close($db);

    include 'views/edit.php';
}

// Funkcja kontrolera do aktualizacji rekordu
function update_record_action($id, $title, $author, $year, $genre, $shelf)
{
    // Połączenie z bazą danych
    $db = db_connect();

    if (!$db) {
        die('Błąd połączenia z bazą danych: ' . mysqli_connect_error());
    }

    // Aktualizacja rekordu
    update_record($db, $id, $title, $author, $year, $genre, $shelf);

    // Zamknięcie połączenia z bazą
    db_close($db);

    // Przekierowanie z powrotem na listę
    header('Location: index.php');
    exit;
}

// Funkcja kontrolera do obsługi dodawania rekordu
function add_record_action($title, $author, $year, $genre, $shelf)
{
    $db = db_connect();
    add_record($db, $title, $author, $year, $genre, $shelf);
    db_close($db);

    // Przekierowanie z powrotem na listę
    header('Location: index.php');
    exit;
}




// Funkcja kontrolera do obsługi usuwania rekordu
function delete_record_action($id)
{
    $db = db_connect();
    delete_record($db, $id);
    db_close($db);

    // Po usunięciu przekierowanie z powrotem na listę
    header('Location: index.php');
    exit;
}
