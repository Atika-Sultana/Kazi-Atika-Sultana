<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "movietvshowreview";
$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) die("Connection Failed: " . $connection->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $year  = $_POST['year'];
    $connection->query("INSERT INTO movies(title, genre, year) VALUES('$title','$genre','$year')");
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Add Movie / TV Show</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="movie-body">
    <div class="container">
        <h2>➕ Add Movie / TV Show</h2>
        <form method="POST" class="form">
            <label>Title</label>
            <input type="text" name="title" required>

            <label>Genre</label>
            <input type="text" name="genre" required>

            <label>Release Year</label>
            <input type="number" name="year" min="1900" max="2099" required>

            <button type="submit" class="btn">Add Movie</button>
        </form>
        <p><a href="index.php" class="back-link">⬅ Back to Movies</a></p>
    </div>
</body>
</html>
