<?PHP

// connect to mysql database
$l=mysqli_connect("localhost:6306","student12","pass12","student12");

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
                    echo "<center><h2>Oops! You are not signed in.</h2></center>";
                    echo "<center><a href=\"login.php\">Click here to sign in.</a></center>";
                    echo "</div>";
                    echo "<div data-role=\"footer\">";
                    echo "<h4><center>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</center></h4>";
                    echo "</div><!-- footer -->";
                    die();
                }

                echo "<center><h2>Enrolled Courses for ".$_SESSION['auth']."</h2></center>";

                // enroll user for courses that they registered for
                $query = "INSERT INTO Enrolled (user_name, course_name) values ('".$_SESSION['auth']."', '".$_POST['course_name']."')";
                $r = mysqli_query($l,$query);
                echo $query;

                // select courses user is enrolled in
                $query = "SELECT * FROM Enrolled WHERE user_name LIKE '".$_SESSION['auth']."'";
                $r = mysqli_query($l,$query);

                // display courses user is enrolled in
                echo "<ul data-role=\"listview\" data-inset=\"true\">";
                while($row=mysqli_fetch_array($r)) {
                    echo "<li>".$row['course_name']."</li>";
                }
                echo "</ul>";
                echo "<center><a href=\"courses.php#two\">Click here to register for more courses.</a></center>";
                echo "<center><a href=\"account.php\">Click here to return to your account page.</a></center>";

                ?>
            </div>
            <!-- /content -->
            <div data-role="footer">
                <?PHP
                echo "<h4><center>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</center></h4>";
                ?>
            </div><!-- footer -->
        </div>

        <!-- Start of first page: #two -->
        <div data-role="page" id="two">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
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

                echo "<center><h2>Select a course to register for:</h2></center>";

                // select all courses
                $query = "SELECT * FROM Courses";
                $r = mysqli_query($l,$query);

                echo "<form action=courses.php#one method=POST align=\"center\">";
                echo "<select name=\"course_name\" id=\"select-choice-1\">";

                // display all courses
                while($row=mysqli_fetch_array($r)) {
                    echo "<option value='".$row['course_name']."'>".$row['course_name']."</option>";
                }
                echo "</select>";
                echo "<input type=\"submit\" value=\"Register\">";
                echo "</form>";

                echo "</ul>";
                echo "<center><a href=\"courses.php#one\">Click here to view your enrolled courses.</a></center>";
                echo "<center><a href=\"account.php\">Click here to return to your account page.</a></center>";

                ?>
            </div>
            <!-- /content -->
            <div data-role="footer">
                <?PHP
                echo "<h4><center>Blackboard Version: ". $learn->learn->major .".".$learn->learn->minor.".".$learn->learn->patch."</center></h4>";
                ?>
            </div><!-- footer -->
        </div>
    </body>
</html>