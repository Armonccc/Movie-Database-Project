<?php

session_start();

//signin.php

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

if (isset($_POST['password']) && $_POST['password'] != "" &&
isset($_POST['email']) && $_POST['email'] != ""

) {

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM user_data WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 1){

   header('location:display.php'); 
exit();

} else {
   echo "<script>alert('You have inserted an invalid email or password, please try again :)')</script>";
}
}
}
mysqli_close($con);
?>

<html>
<body>
<h1>Enter Your Credentials To Access Your Movies </h1>
<form class="" action="" method="POST">
<p>Username:
<input type="text" value="" length="100" name="email" placeholder="Please enter your username" size="25" required>
</p>
<p>Password:
<input type="password" value="" length="100" name="password" placeholder="Please enter your password" size="25" required>
</p>


<input class="login" type="submit" value="Login">
</form>


<a href = "register.php">Don't have an account? Click me to register</a>
</body>

<style>
input.login{
width: 75px;
}
</style>



</html>


