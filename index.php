<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista użytkowników</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lista użytkowników</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Połączenie z bazą danych MySQL
                $mysqli = new mysqli("localhost", "nazwa_uzytkownika", "haslo", "nazwa_bazy_danych");

                // Sprawdzenie połączenia
                if($mysqli === false){
                    die("Błąd połączenia z bazą danych: " . $mysqli->connect_error);
                }

                // Zapytanie SQL do pobrania użytkowników
                $sql = "SELECT id, first_name, last_name, email FROM users";
                if($result = $mysqli->query($sql)){
                    // Pętla wyświetlająca wyniki zapytania
                    while($row = $result->fetch_array()){
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }
                    // Zwolnienie zasobów wyniku zapytania
                    $result->free();
                } else{
                    echo "Błąd: Nie udało się wykonać zapytania: $sql. " . $mysqli->error;
                }

                // Zamknięcie połączenia z bazą danych
                $mysqli->close();
            ?>
        </tbody>
    </table>

    <!-- Dodanie obrazka -->
    <img src="cat.jpg" alt="Obrazek" width="1200">

</body>
</html>

