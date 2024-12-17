<?php
require_once 'models/DataModel.php';

// Funkcja kontrolera do obsługi wyświetlania listy
function display_list() {
    // Połączenie z bazą danych
    $db = db_connect();

    // Pobranie danych z modelu
    $records = get_all_records($db);

    // Zamknięcie połączenia
    db_close($db);

    // Załadowanie widoku z danymi
    include 'views/list.php';
}