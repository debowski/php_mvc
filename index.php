<?php
require_once 'controllers/DataController.php';

// Obsługa akcji na podstawie żądania
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;

    if ($action === 'delete' && $id !== null) {
        // Usuwanie rekordu
        delete_record_action($id);
    } elseif ($action === 'update' && $id !== null) {
        // Aktualizacja rekordu
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $year = $_POST['year'] ?? 0;
        $genre = $_POST['genre'] ?? '';
        $shelf = $_POST['shelf'] ?? '';

        update_record_action($id, $title, $author, $year, $genre, $shelf);
    } elseif ($action === 'edit' && $id !== null) {
        // Wyświetlenie formularza edycji
        display_edit_form($id);
    } elseif ($action === 'addbook') {
        // Dodawanie nowego rekordu
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $year = $_POST['year'] ?? 0;
        $genre = $_POST['genre'] ?? '';
        $shelf = $_POST['shelf'] ?? '';

        add_record_action($title, $author, $year, $genre, $shelf);
    } else {
        // Domyślnie: wyświetlenie listy rekordów
        display_list();
    }
} else {
    // Domyślna obsługa dla innych metod żądania
    display_list();
}
