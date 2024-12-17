<?php

// Funkcja do nawiązania połączenia z bazą danych
function db_connect() {
    $db = mysqli_connect('localhost', 'root', '', 'test_db');

    if (!$db) {
        die('Błąd połączenia z bazą danych: ' . mysqli_connect_error());
    }

    return $db;
}

// Funkcja do pobierania danych z tabeli
function get_all_records($db) {
    $query = "SELECT * FROM records";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die('Błąd zapytania: ' . mysqli_error($db));
    }

    // Pobranie danych jako tablica asocjacyjna
    $records = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $records[] = $row;
    }

    mysqli_free_result($result);

    return $records;
}

// Funkcja do zamknięcia połączenia
function db_close($db) {
    mysqli_close($db);
}