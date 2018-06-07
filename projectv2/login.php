<?PHP
// connect to mysql database
$l = mysqli_connect("localhost:6306", "student12", "pass12", "student12");

// query to populate combobox search
$query = "SELECT * FROM Students ORDER BY user_name";
$r = mysqli_query($l, $query);

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
                <h2><center>Login</center></h2>
                <form action=verify.php method=POST align="center">
                    <label for="username">Username:</label>
                    <input type="text" data-clear-btn="true" name="username" id="text_1" value="">
                    <label for="password">Password:</label>
                    <input type="text" data-clear-btn="true" name="password" id="text_1" value="">
                    <input type="submit" value="Login">
                </form>
                <?PHP
                echo "<h4><center>BlackBoard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</center></h4>";
                ?>

            </div>
            <!-- /content -->
        </div>
        <!-- /page one -->
    </body>
</html>