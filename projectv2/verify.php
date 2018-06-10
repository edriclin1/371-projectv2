<?PHP
session_start();

require("database_connection.php");
require("blackboard_connection.php");

// select student row with username
$query = "SELECT * FROM Students WHERE user_name LIKE '".$_POST["username"]."'";
//echo $query;

//executing query
$r = mysqli_query($l,$query);
$row = mysqli_fetch_array($r);

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Electric Currents Blackboard v2 - Verifying Login</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet"  href="css/jquery_pages.css">
        <link rel="stylesheet" href="css/jquery_pages2.css">
        <link rel="shortcut icon" href="https://demos.jquerymobile.com/1.3.2/favicon.ico">
    </head>
    <body>
        <!-- Start of first page: #one -->
        <div data-role="page" id="verify">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
            </div>
            <!-- /header -->
            <div data-role="content" >
                <?PHP
                //print_r($_POST);

                // check correct password
                if($_POST["password"] == $row["password"] && !empty($_POST["username"]) && isset($row)) {
                    echo "<h2>Welcome, " . $row["given_name"] . " " . $row["family_name"] . "!</h2>";
                    echo "<center><a href=\"account.php\">Go to your account.</a></center>";
                    $_SESSION['auth'] = $_POST['username'];
                    echo $_SESSION['auth'];
                } else {
                    echo "<h2>Oops! You entered an invalid username and password.</h2>";
                    echo "<center><a href=\"login.php\">Return to the sign in page.</a></center>";
                    //logout
                    $_SESSION['auth'] = "";
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