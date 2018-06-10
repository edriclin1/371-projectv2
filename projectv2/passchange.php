<?PHP

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
        <title>Electric Currents Blackboard v2 - Login</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet"  href="css/jquery_pages.css">
        <link rel="stylesheet" href="css/jquery_pages2.css">
        <link rel="shortcut icon" href="https://demos.jquerymobile.com/1.3.2/favicon.ico">
        <script src="https://demos.jquerymobile.com/1.3.2/js/jquery.js"></script>
        <script src="https://demos.jquerymobile.com/1.3.2/_assets/js/index.js"></script>
        <script src="https://demos.jquerymobile.com/1.3.2/js/jquery.mobile-1.3.2.min.js"></script>
    </head>
    <body>
        <!-- Start of first page: #one -->
        <div data-role="page" id="passchange">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
                <div data-role="navbar" data-grid="c">
                    <ul>
                        <li><a href="account.php">Account</a></li>
                        <li><a href="courses.php">Courses</a></li>
                        <li><a href="passchange.php" class="ui-btn-active">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div><!-- /navbar -->
            </div>
            <!-- /header -->
            <div data-role="content" >
                <?php
                session_start();

                // check if not logged in
                if ($_SESSION['auth'] == "") {
                    echo "<center><h2>Oops! You are not signed in.</h2></center>";
                    echo "<center><a href=\"login.php\">Click here to sign in.</a></center>";
                    echo "</div>";
                    echo "<div data-role=\"footer\">";
                    echo "<h4><center>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</center></h4>";
                    echo "</div><!-- footer -->";
                    die();
                }
                ?>
                <form action="update.php" method="POST" align="center">
                    <label for="oldPassword">Old Password:</label>
                    <input type="password" data-clear-btn="true" name="oldPassword" value="">
                    <label for="newPassword">New Password:</label>
                    <input type="password" data-clear-btn="true" name="newPassword" value="">
                    <input type=submit value="Submit">
                </form>

                <!-- <center><a href="account.php">Return to Account</a></center> -->
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