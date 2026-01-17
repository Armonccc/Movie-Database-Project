<?php 

//insert.php

$success = "";

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (
isset($_POST['MovieName']) && $_POST['MovieName'] != "" &&
isset($_POST['ReleaseDate']) && $_POST['ReleaseDate'] != "" &&
isset($_POST['GenreID']) && $_POST['GenreID'] != "" &&
isset($_POST['StudioID']) && $_POST['StudioID'] != "" &&
isset($_POST['DirectorID']) && $_POST['DirectorID'] != "" &&
isset($_POST['Synopsis']) && $_POST['Synopsis'] != "" &&
isset($_POST['Rating']) && $_POST['Rating'] != "" &&
isset($_POST['Runtime']) && $_POST['Runtime'] != ""

) {
    $MovieName = $_POST['MovieName'];
    $ReleaseDate = $_POST['ReleaseDate'];
    $GenreID = $_POST['GenreID'];
    $Runtime = $_POST['Runtime'];
    $StudioID = $_POST['StudioID'];
    $DirectorID = $_POST['DirectorID'];
    $Synopsis = $_POST['Synopsis'];
    $Rating = $_POST['Rating'];

$sql_add_query = "INSERT INTO Movie (MovieName, ReleaseDate, Runtime, GenreID, StudioID, DirectorID, Synopsis, Rating) VALUES ('$MovieName', '$ReleaseDate', '$Runtime', '$GenreID', '$StudioID', '$DirectorID', '$Synopsis', '$Rating')";
//Need because of Auto Increment 
if (!mysqli_query($con,$sql_add_query)) {
    die("Error: The Movie could not be added!");
}
else {
    $success = "The Movie has been added successfully!";
    // So the value in $success is being put into $success = ""; 
    //Which can now be used anywhere in the document
    // So we can now place the "The professor has been added successfully!" message
    //below the display all professors href statement!!   
}
} 
}
?>

<html>
<body>

<form method = "POST" action = "">

<input type = "text" name="MovieName" size = "30" placeholder = "Insert movie"/>

<br>
<br>

<input name = "ReleaseDate" type = "date">


<br>
<br>

<input type = "text" name="Runtime" size = "30" placeholder = "Insert Runtime"/>

<br>
<br>

<input type = "text" name="GenreID" size = "30" placeholder = "Insert genre ID"/>

<br>
<br>

<input type = "text" name="StudioID" size = "30" placeholder = "Insert studio ID"/>

<br>
<br>

<input type = "text" name="DirectorID" size = "30" placeholder = "Insert director ID"/>

<br>
<br>

<textarea name="Synopsis" rows="4" cols="50" placeholder="Insert Synopsis"></textarea>

<br>
<br>

<input type = "text" name="Rating" size = "30" placeholder = "Insert rating"/>

<br>
<br>


<input type = "submit" value = "Insert"/>

<br>
<br>

<a href = "display.php">Click here to see your movies table</a>

<br>
<br>

<?php echo "$success"?>

</form>
</body>
</html>