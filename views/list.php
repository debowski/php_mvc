<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista danych</title>
</head>
<body>
    
    <h1>Lista rekordów</h1>
    <ul>
        <?php foreach ($records as $record): ?>
            <li><?php echo htmlspecialchars($record['id']." ".$record['title']." ".$record['author']." ".$record['year']." ".$record['genre']." ".$record['shelf'] ); ?>       
            <!-- Formularz do usunięcia rekordu -->
            <form method="POST" action="index.php" style="display:inline;">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                <button type="submit">Usuń</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>