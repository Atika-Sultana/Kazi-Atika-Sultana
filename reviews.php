<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "movietvshowreview";
$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) die("Connection failed: " . $connection->connect_error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Movie / TV Show Reviews</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>⭐ Movie / TV Show Reviews</h1>
    <div class="top-links">
        <a class="btn" href="home.php">🏠 Home</a>
        <a class="btn" href="index.php">📋 All Movies</a>
    </div>

    <table>
        <tr>
            <th>Movie / TV Show</th>
            <th>Username</th>
            <th>Review</th>
            <th>Rating</th>
        </tr>

        <?php
        $sql = "SELECT r.*, m.title 
                FROM reviews r 
                JOIN movies m ON r.movie_id = m.id";
        $data = $connection->query($sql);

        while ($row = $data->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['review_text']}</td>
                    <td>{$row['rating']} ⭐</td>
                  </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
