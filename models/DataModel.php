<?php

// Funkcja do nawiązania połączenia z bazą danych
function db_connect() {
    $db = mysqli_connect('localhost', 'root', '', 'mvcdb');
    mysqli_set_charset($db, 'utf8');
    if (!$db) {
        die('Błąd połączenia z bazą danych: ' . mysqli_connect_error());
    }

    return $db;
}

// Funkcja do pobierania wszystkich rekordów
function get_all_records($db) {
    $query = "SELECT * FROM records";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die('Błąd zapytania: ' . mysqli_error($db));
    }

    $records = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $records[] = $row;
    }

    mysqli_free_result($result);

    return $records;
}

// Funkcja do usuwania rekordu na podstawie ID
function delete_record($db, $id) {
    $id = intval($id); // Bezpieczna konwersja na liczbę całkowitą
    $query = "DELETE FROM records WHERE id = $id";

    if (!mysqli_query($db, $query)) {
        die('Błąd usuwania rekordu: ' . mysqli_error($db));
    }
}

// Funkcja do zamknięcia połączenia
function db_close($db) {
    mysqli_close($db);
}
