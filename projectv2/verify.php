<?PHP

// connect to mysql database
$l=mysqli_connect("localhost:6306","student12","pass12","student12");

// select entire students table
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
        <link rel="stylesheet"  href="css/jquery_pages.css">
        <link rel="stylesheet" href="css/jquery_pages2.css">
        <link rel="shortcut icon" href="https://demos.jquerymobile.com/1.3.2/favicon.ico">
    </head>
    <body>
        <!-- Start of first page: #one -->
        <div data-role="page" id="one">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
            </div>
            <!-- /header -->
            <div data-role="content" >
                <?PHP
                session_start();
                //print_r($_POST);

                // check correct password
                if($_POST["password"] == $row["password"]) {
                    echo "<center><h1>Welcome, " . $row["given_name"] . " " . $row["family_name"] . "!<h1></center>";
                    echo "<center><a href=\"https://edriclin1.ddns.net:9012/projectv2/account.php\">Go to your account.</a></center>";
                    $_SESSION['auth'] = $_POST['username'];
                } else {
                    echo "<center><h1>Oops! You entered an invalid username and password.</h1></center>";
                    echo "<center><a href=\"https://edriclin1.ddns.net:9012/projectv2/login.php\">Return to the sign in page.</a></center>";
                    //logout
                    $_SESSION['auth'] = "";
                }
                ?>
            </div>
            <!-- /content -->
        </div>
        <!-- /page one -->
    </body>
</html>