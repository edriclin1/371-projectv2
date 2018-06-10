<?PHP

require("database_connection.php");
require("blackboard_connection.php");

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Password Changed</title>
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
        <div data-role="page" id="update">
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

                require("confirm_logged_in.php");

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
                        echo "<h2>Your password has successfully been changed.</h2>";
                    } else {
                        echo "<h2>Oops! Your password cannot contain backslashes or HTML tags.</h2>";
                    }
                } else {
                    echo "<h2>Oops! You did not enter the correct old password.</h2>";
                }
                // echo "<center><a href=\"account.php\">Click here to return to your account page.</a></center>";

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