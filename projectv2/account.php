<?PHP

require("database_connection.php");
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
        <div data-role="page" id="account">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
                <div data-role="navbar" data-grid="c">
                    <ul>
                        <li><a href="account.php" class="ui-btn-active">Account</a></li>
                        <li><a href="courses.php">Courses</a></li>
                        <li><a href="passchange.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div><!-- /navbar -->
            </div>
            <!-- /header -->
            <div data-role="content" >
                <?php require("confirm_logged_in.php"); ?>
                <h2>Welcome to Blackboard V2!</h2>
                <h3>Register for courses or change your password using the tabs above.</h3>
                <br />
                <!--
                <center><a href="courses.php">View/Register for Courses</a></center>
                <center><a href="passchange.php">Change Password</a></center>
                <center><a href="logout.php">Log Out</a></center>
                <br />
                -->
            </div>
            <!-- /content -->
            <div data-role="footer">
                <?PHP
                echo "<h4>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</h4>";
                ?>
            </div><!-- footer -->
        </div>
    </body>
</html>