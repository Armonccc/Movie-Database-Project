<?php

//logout.php

require_once 'connection.php';

    session_start();
    session_destroy();

?>
<html>

<div>

<h1>You have successfully logged out</h1>


<a href="signin.php">
    <button >Click here to Sign in</button>
</a>

</div>
</html>