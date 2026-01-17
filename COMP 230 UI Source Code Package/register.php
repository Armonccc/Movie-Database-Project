<?php
//register.php

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (
isset($_POST['email']) && $_POST['email'] != "" &&
isset($_POST['password']) && $_POST['password'] != "" 

) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = " SELECT * FROM user_data WHERE email = '$email'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1){

      echo"These credentials are already in our database! Try Again!";
     
     } else {

    
$sql_add_query = "INSERT INTO user_data VALUES ('$email', '$password')";

if (!mysqli_query($con,$sql_add_query)) {
    die("Error: The following credentials could not be added!");
}

else {
    header('location:signin.php');
    exit();
}
} 
}
}

mysqli_close($con);

?>

<html>

<head>
<style>
input.register{
width: 150px;
}
</style>
</head>

<form class="" action="" method="POST">

<h1 class="">Don't have an account? JOIN TODAY!!</h1>

<p> Username:
<input class="" type="text" name="email" size="30" placeholder = "Please enter your username" required>
</p>


<p> Password:
<input class="" type ="password" name = "password" size ="30" placeholder = "Please enter your password" required>
</p>


<input class="register" type="submit" value="Create Your Account">

<br>
<br>
</form>
</body>
</html>