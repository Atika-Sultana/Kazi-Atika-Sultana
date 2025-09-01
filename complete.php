<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "movietvshowreview"; // ✅ movie DB
$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("CONNECTION FAILED: " . $connection->connect_error);
}

$year_now = date("Y"); // ✅ current year
$data = $connection->query("SELECT * FROM movies WHERE year < '$year_now'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Released Movies / TV Shows</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🎬 Released Movies / TV Shows</h1>
        <div class="top-links">
            <a class="btn" href="home.php">⬅ Back Home</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Release Year</th>
            </tr>
            <?php while ($row = $data->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['genre'] ?></td>
                    <td><?= $row['year'] ?></td>
                </tr>
            <?php 
            }
             ?>
        </table>
    </div>
</body>
</html>
