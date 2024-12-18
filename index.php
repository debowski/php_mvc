<?php
require_once 'controllers/DataController.php';

// Obsługa akcji na podstawie żądania
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete') {
    // Obsługa usuwania rekordu
    if (isset($_POST['id'])) {
        delete_record_action($_POST['id']);
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add') {
    // Obsługa dodawania rekordu
    if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['year']) && isset($_POST['genre']) && isset($_POST['shelf'])) {
        add_record_action($_POST['title'], $_POST['author'], $_POST['year'], $_POST['genre'], $_POST['shelf']);
     }
}else {
    // Wyświetlenie listy rekordów
    display_list();
}



?>