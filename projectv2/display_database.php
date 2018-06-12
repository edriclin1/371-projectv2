<?PHP

// connect to mysql database
require("database_connection.php");

// select entire Users table
$query = "SELECT * FROM Users";
echo $query;

//executing query
$r = mysqli_query($l,$query);

//working with the recordset
echo "<table border=1 cellpadding=10 >";
echo "<tr><th>ID</th><th>Username</th><th>Given Name</th><th>Family Name</th><th>Role</th><th>Password</th></tr>";

// display Users table
while($row=mysqli_fetch_array($r)) {
    echo "<tr>";
        echo "<td>";
            echo $row['id'];
        echo "</td><td>";
            echo $row['user_name'];
        echo "</td><td>";
            echo $row['given_name'];
        echo "</td><td>";
            echo $row['family_name'];
        echo "</td><td>";
            echo $row['role'];
        echo "</td><td>";
            echo $row['password'];
        echo "</td>";
    echo "</tr>";
}
echo "</table>";

// select entire courses table
$query = "SELECT * FROM Courses";
echo $query;

//executing query
$r = mysqli_query($l,$query);

//working with the recordset
echo "<table border=1 cellpadding=10 >";
echo "<tr><th>ID</th><th>Course Name</th><th>Number Enrolled</th></tr>";

// display courses table
while($row=mysqli_fetch_array($r)) {
    echo "<tr>";
        echo "<td>";
            echo $row['id'];
        echo "</td><td>";
            echo $row['course_name'];
        echo "</td><td>";
            echo $row['num_enrolled'];
        echo "</td>";
    echo "</tr>";
}
echo "</table>";

// select entire enrolled table
$query = "SELECT * FROM Enrolled";
echo $query;

//executing query
$r = mysqli_query($l,$query);

//working with the recordset
echo "<table border=1 cellpadding=10 >";
echo "<tr><th>ID</th><th>Username</th><th>Course Name</th></tr>";

// display enrolled table
while($row=mysqli_fetch_array($r)) {
    echo "<tr>";
        echo "<td>";
            echo $row['id'];
        echo "</td><td>";
            echo $row['user_name'];
        echo "</td><td>";
            echo $row['course_name'];
        echo "</td>";
    echo "</tr>";
}
echo "</table>";

?>