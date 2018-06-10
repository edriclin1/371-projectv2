<?PHP

require("blackboard_connection.php");

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
                <?php require("confirm_logged_in.php"); ?>
                <h2>Password Change</h2>
                <h3>Enter your current password and desired new password.</h3>
                <br>
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
                echo "<h4>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</h4>";
                ?>
            </div><!-- footer -->
        </div>
        <!-- /page one -->
    </body>
</html>