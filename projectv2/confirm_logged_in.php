<?php

session_start();

// check if not logged in
if ($_SESSION['auth'] == "") {
    echo "<h2>Oops! You are not signed in.</h2>";
    echo "<center><a href=\"login.php\">Click here to sign in.</a></center>";
    echo "</div>";
    echo "<div data-role=\"footer\">";
    echo "<h4>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</h4>";
    echo "</div><!-- footer -->";
    die();
}

?>