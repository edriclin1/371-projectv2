<?PHP
// connect to mysql database
$l = mysqli_connect("localhost:6306", "student12", "pass12", "student12");

// connect to blackboard rest api
$clientURL = "http://bb.dataii.com:8080";

require_once('classes/Rest.class.php');
require_once('classes/Token.class.php');

$rest = new Rest($clientURL);
$token = new Token();

$token = $rest->authorize();
$access_token = $token->access_token;

$learn = $rest->readVersion($access_token);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Password Changed</title>
        <link rel="stylesheet"  href="css/jquery_pages.css">
        <link rel="stylesheet" href="css/jquery_pages2.css">
        <link rel="shortcut icon" href="https://demos.jquerymobile.com/1.3.2/favicon.ico">
        <script src="https://demos.jquerymobile.com/1.3.2/js/jquery.js"></script>
        <script src="https://demos.jquerymobile.com/1.3.2/_assets/js/index.js"></script>
        <script src="https://demos.jquerymobile.com/1.3.2/js/jquery.mobile-1.3.2.min.js"></script>
    </head>
    <body>
        <!-- Start of first page: #one -->
        <div data-role="page" id="one">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
            </div>
            <!-- /header -->
            <div data-role="content" >
                <?php
                session_start();

                // check if not logged in
                if ($_SESSION['auth'] == "") {
                    echo "<center><h1>Oops! You are not signed in.</h1></center>";
                    echo "<center><a href=\"login.php\">Click here to sign in.</a></center>";
                    echo "</div>";
                    echo "<div data-role=\"footer\">";
                    echo "<h4><center>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</center></h4>";
                    echo "</div><!-- footer -->";
                    die();
                } else {

                    // select student with currently logged in in username
                    $query = "SELECT * FROM Students WHERE user_name LIKE '".$_SESSION['auth']."'";
                    $r = mysqli_query($l,$query);
                    $row = mysqli_fetch_array($r);

                    // check if old password is correct
                    if($_POST["oldPassword"] == $row["password"]) {

                        // check that new password contains no slashes or html tags
                        if (stripslashes(strip_tags($_POST['newPassword'])) == $_POST['newPassword']) {

                            // change old password to new password
                            $query = "UPDATE Students SET password = '".$_POST['newPassword']."' WHERE user_name LIKE '".$_SESSION['auth']."'";
                            $r = mysqli_query($l,$query);
                            echo "<h3><center>Your password has successfully been changed.</center></h3>";
                        } else {
                            echo "<center><h3>Oops! You cannot enter backslashes or HTML tags in your new password.</h3></center>";
                        }
                    } else {
                        echo "<center><h3>Oops! You did not enter the correct old password.</h3></center>";
                    }
                    echo "<center><a href=\"account.php\">Click here to return to your account page.</a></center>";
                }
                ?>
            </div>
            <!-- /content -->
            <div data-role="footer">
                <?PHP
                echo "<h4><center>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</center></h4>";
                ?>
            </div><!-- footer -->
        </div>
        <!-- /page one -->
    </body>
</html>