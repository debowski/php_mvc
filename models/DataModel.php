<?php

// Funkcja do nawiązania połączenia z bazą danych
function db_connect()
{
    $db = mysqli_connect('localhost', 'root', '', 'mvcdb');
    mysqli_set_charset($db, 'utf8');

    if (!$db) {
        die('Błąd połączenia z bazą danych: ' . mysqli_connect_error());
    }

    return $db;
}

// Funkcja do pobierania wszystkich rekordów
function get_all_records($db)
{
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

// Funkcja do pobierania konkretnego rekordu
function get_record_by_id($db, $id)
{
    $id = intval($id);
    $query = "SELECT * FROM records WHERE id = $id";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die('Błąd zapytania: ' . mysqli_error($db));
    }

    $record = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $record;
}

// Funkcja do aktualizacji rekordu
function update_record($db, $id, $title, $author, $year, $genre, $shelf)
{
    $id = intval($id); // Zabezpieczenie identyfikatora
    $title = mysqli_real_escape_string($db, $title);
    $author = mysqli_real_escape_string($db, $author);
    $year = intval($year); // Rok jako liczba całkowita
    $genre = mysqli_real_escape_string($db, $genre);
    $shelf = mysqli_real_escape_string($db, $shelf);

    // Zapytanie aktualizujące wszystkie pola rekordu
    $query = "
        UPDATE records 
        SET 
            title = '$title', 
            author = '$author', 
            year = $year, 
            genre = '$genre', 
            shelf = '$shelf' 
        WHERE 
            id = $id
    ";

    // Wykonanie zapytania i obsługa błędów
    if (!mysqli_query($db, $query)) {
        die('Błąd aktualizacji rekordu: ' . mysqli_error($db));
    }
}

// Funkcja do usuwania rekordu
function delete_record($db, $id)
{
    $id = intval($id);
    $query = "DELETE FROM records WHERE id = $id";

    if (!mysqli_query($db, $query)) {
        die('Błąd usuwania rekordu: ' . mysqli_error($db));
    }
}

// Funkcja do dodawania książek

function add_record($db, $title, $author, $year, $genre, $shelf)
{
    $title = mysqli_real_escape_string($db, $title);
    $author = mysqli_real_escape_string($db, $author);
    $year = intval($year); // Rok jako liczba całkowita
    $genre = mysqli_real_escape_string($db, $genre);
    $shelf = mysqli_real_escape_string($db, $shelf);

    $query = "
        INSERT INTO records (title, author, year, genre, shelf) 
        VALUES ('$title', '$author', $year, '$genre', '$shelf')
    ";

    if (!mysqli_query($db, $query)) {
        die('Błąd dodawania rekordu: ' . mysqli_error($db));
    }
}





// Funkcja do zamknięcia połączenia
function db_close($db)
{
    mysqli_close($db);
}
