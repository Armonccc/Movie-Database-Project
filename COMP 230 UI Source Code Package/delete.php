<?php

//delete.php
require_once 'connection.php';

$MovieID = $_GET['MovieID'];

$query = "DELETE FROM Movie WHERE MovieID = '$MovieID'";
//This will be related to movies instead

$result = mysqli_query($con,$query);

if(!$result) {

    echo"We could not delete the movie of your choice";
}
else {

    echo"The Movie has been successfully removed!";
}
?>

<html>
    <br>
    <br>
    <a href = "display.php">Click here to see your movies table</a>
</html>