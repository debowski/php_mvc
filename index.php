<?php
require_once 'controllers/DataController.php';

// Obsługa akcji na podstawie żądania
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete') {
    // Obsługa usuwania rekordu
    if (isset($_POST['id'])) {
        delete_record_action($_POST['id']);
    }
} else {
    // Wyświetlenie listy rekordów
    display_list();
}



?>