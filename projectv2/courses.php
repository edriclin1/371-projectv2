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
        <div data-role="page" id="one">
            <div data-role="header">
                <h1>Electric Currents Blackboard v2</h1>
                <div data-role="navbar" data-grid="c">
                    <ul>
                        <li><a href="account.php">Account</a></li>
                        <li><a href="courses.php" class="ui-btn-active">Courses</a></li>
                        <li><a href="passchange.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div><!-- /navbar -->
            </div>
            <!-- /header -->
            <div data-role="content" >
                <?php

                require("confirm_logged_in.php");

                echo "<h2>Enrolled Courses for ".$_SESSION['auth']."</h2>";
                echo "<h3>Click \"register for courses\" to see the full course selection.</h3>";

                // enroll user for courses that they registered for
                $query = "INSERT INTO Enrolled (user_name, course_name) values ('".$_SESSION['auth']."', '".$_POST['course_name']."')";
                $r = mysqli_query($l,$query);
                // echo $query;

                // select courses user is enrolled in
                $query = "SELECT * FROM Enrolled WHERE user_name LIKE '".$_SESSION['auth']."'";
                $r = mysqli_query($l,$query);

                // display courses user is enrolled in
                echo "<ul data-role=\"listview\" data-inset=\"true\">";
                while($row=mysqli_fetch_array($r)) {
                    echo "<li>".$row['course_name']."</li>";
                }
                echo "</ul>";
                echo "<a data-role=\"button\" rel=\"external\" href=\"#two\">Register for Courses</a>";
                // echo "<center><a href=\"account.php\">Return to Account</a></center>";

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
                <div data-role="navbar" data-grid="c">
                    <ul>
                        <li><a href="account.php">Account</a></li>
                        <li><a href="courses.php" class="ui-btn-active">Courses</a></li>
                        <li><a href="passchange.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div><!-- /navbar -->
            </div>
            <!-- /header -->
            <div data-role="content" >
                <?php

                require("confirm_logged_in.php");

                echo "<center><h2>Select a course to register for:</h2></center>";
                echo "<h3>Click \"view enrolled courses\" to see your current courses.</h3>";

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
                echo "<center><a data-role=\"button\" href=\"#one\">View Enrolled Courses</a></center>";
                // echo "<center><a href=\"account.php\">Return to Account</a></center>";

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