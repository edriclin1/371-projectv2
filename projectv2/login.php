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
        <script src="easter_egg.js"></script>
    </head>
    <body>
        <!-- Start of first page: #one -->
        <div data-role="page" id="login">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
            </div>
            <!-- /header -->
            <div data-role="content" id="middle">
                <form action=verify.php method=POST align="center">
                    <label for="username">Username:</label>
                    <input type="text" data-clear-btn="true" name="username" value="">
                    <label for="password">Password:</label>
                    <input type="password" data-clear-btn="true" name="password" value="">
                    <input type="submit" value="Login">
                </form>
                <center><img src="images/easter_egg.png" alt="easter_egg" id="easter_egg"></center>
                <center><h4 id="cis">CIS 371 RULES!</h4></center>
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