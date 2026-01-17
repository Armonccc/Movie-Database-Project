<?php 

//update.php

$success = "";

require_once 'connection.php';

$MovieID = $_GET['MovieID'];

$query = "SELECT * FROM Movie WHERE MovieID = '$MovieID'";
//Took from delete.php

$result = mysqli_query($con,$query);
$fetch=mysqli_fetch_assoc($result);

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
    $Runtime = $_POST['Runtime'];
    $GenreID = $_POST['GenreID'];
    $StudioID = $_POST['StudioID'];
    $DirectorID = $_POST['DirectorID'];
    $Synopsis = $_POST['Synopsis'];
    $Rating = $_POST['Rating'];


$sql_update_query = "UPDATE Movie SET MovieName='$MovieName', GenreID='$GenreID', DirectorID='$DirectorID', Rating='$Rating', Synopsis='$Synopsis', Runtime='$Runtime', ReleaseDate='$ReleaseDate', StudioID='$StudioID' WHERE MovieID='$MovieID'";
if (!mysqli_query($con,$sql_update_query)) {
    die("Error: The Movie could not be updated!");
}
else {
    $success = "The Movie has been updated successfully!";
     
}
} 
}

?>


<html>
<body>

<form method = "POST" action = "">


<input type = "text" name="MovieName" value="<?php echo $fetch['MovieName'];?>"size = "30"/>

<br>
<br>

<input name = "ReleaseDate" type = "date" value="<?php echo $fetch['ReleaseDate'];?>">


<br>
<br>

<input type = "text" name="Runtime" size = "30" value="<?php echo $fetch['Runtime'];?>"/>

<br>
<br>

<input type = "text" name="GenreID" size = "30" value="<?php echo $fetch['GenreID'];?>"/>

<br>
<br>

<input type = "text" name="StudioID" size = "30" value="<?php echo $fetch['StudioID'];?>"/>

<br>
<br>

<input type = "text" name="DirectorID" size = "30" value="<?php echo $fetch['DirectorID'];?>"/>

<br>
<br>

<textarea name="Synopsis" rows="4" cols="50"><?php echo $fetch['Synopsis'];?></textarea>

<br>
<br>

<input type = "text" name="Rating" size = "30" value="<?php echo $fetch['Rating'];?>"/>

<br>
<br>

<input type = "hidden" name="MovieID" size = "30" value="<?php echo $fetch['MovieID'];?>"/>
<br>


<input type = "submit" value = "Update"/>

<br>
<br>

<a href = "display.php">Click Here, if you want to see your updated films</a>

<br>
<br>

<?php echo "$success"?>

</form>
</body>
</html>

