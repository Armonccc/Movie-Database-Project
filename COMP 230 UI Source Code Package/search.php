
<?php

//search.php

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$MOVIES = $_POST['MovieName'];


$query = "SELECT * FROM Movie WHERE MovieName like '%$MOVIES%'";


$result = mysqli_query($con,$query);


if (mysqli_num_rows($result) > 0) {

    echo "<table border='1'>
            <tr>
                <th>Movie</th>
                <th>Release Date</th>
                <th>GenreID</th>
                <th>StudioID</th>
                <th>DirectorID</th>
                <th>Rating</th>
                <th>Synopsis</th>
        
            </tr>";

    while ($fetch = mysqli_fetch_assoc($result)) {

        echo "<tr>
                <td>{$fetch['MovieName']}</td>
                <td>{$fetch['ReleaseDate']}</td>
                <td>{$fetch['GenreID']}</td>
                <td>{$fetch['StudioID']}</td>
                <td>{$fetch['DirectorID']}</td>
                <td>{$fetch['Rating']}</td>
                <td>{$fetch['Synopsis']}</td>

              </tr>";
    }
    

    echo "</table>";

} else {
    echo "Sorry you don't have this movie in your library!";
}
}
?>


<html>

<h1>SEARCH FOR YOUR MOVIE</h1>

<form action="" method="POST">
    <input type="text" placeholder="Enter the movie name" name="MovieName"/>
    <br>
    <br>
    <input type="submit" value="Search"/>
</form>

<a href = "display.php">Click Here, if you want to go back to your table of movies!</a>

</html>

