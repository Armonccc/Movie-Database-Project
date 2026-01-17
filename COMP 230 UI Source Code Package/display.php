<?php

//display.php
require_once 'connection.php';

$query = "SELECT * FROM Movie";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<html>
<body>

<h2>WELCOME!!!</h2>
<h3>THESE ARE YOUR MOVIES</h3>

<?php
if (mysqli_num_rows($result) > 0) {

    echo "<table border='1'>
            <tr>
                <th>MovieID</th>
                <th>Movie</th>
                <th>Release Date</th>
                <th>Runtime</th>
                <th>Genre</th>
                <th>StudioID</th>
                <th>DirectorID</th>
                <th>Rating</th>
                <th>Synopsis</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>
                <td>{$row['MovieID']}</td>
                <td>{$row['MovieName']}</td>
                <td>{$row['ReleaseDate']}</td>
                <td>{$row['Runtime']} min</td>
                <td>{$row['GenreID']}</td>
                <td>{$row['StudioID']}</td>
                <td>{$row['DirectorID']}</td>
                <td>{$row['Rating']}</td>
                <td>{$row['Synopsis']}</td>
                <td><a href='update.php?MovieID={$row['MovieID']}'>Edit</a></td>
    
                <td><a href='delete.php?MovieID={$row['MovieID']}'>Delete</a></td>
              </tr>";
    }
    

    echo "</table>";

} else {
    echo "No movie data available.";
}
?>

</body>
<br>

<h4>Click the below hyperlink, if you want to add a new movie to your table!</h4>
<a href='insert.php'>Insert new movie</a>
<br>
<h4>Click the below hyperlink, if you want to search for a movie on your table!</h4>
<a href='search.php'>Can't find your movie? Click this hyperlink</a>
<br>
<h4>Click the below hyperlink, if you wish to logout</h4>
<a href='logout.php'>Logout</a>
</html>
