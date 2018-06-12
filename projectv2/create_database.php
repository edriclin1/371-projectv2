<?PHP

// connect to blackboard rest api
require("database_connection.php");
require("blackboard_connection.php");

// get user data from blackboard rest api
$users = $rest->readAllUsers($access_token);
$u=$users->results;

// get course data from blackboard rest api
$courses = $rest->readAllCourses($access_token);
$c=$courses->results;

// delete students table if one has already been created
$query = "DROP TABLE Users";
$r = mysqli_query($l,$query);

// recreate students table
$query = "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    given_name VARCHAR(30) NOT NULL,
    family_name VARCHAR(30) NOT NULL,
    role VARCHAR(30) NOT NULL,
    password VARCHAR(15),
    UNIQUE (user_name)
    )";
$r = mysqli_query($l,$query);

// insert blackboard student data into table
foreach($u as $row) {

    // check if user is a student
    $institution_role_id = $row->institutionRoleIds[0];
    
    // get fields
    $user_name = $row->userName;
    $given_name = $row->name->given;
    $family_name = $row->name->family;

    // insert fields into database
    $query = "INSERT INTO Users (user_name, given_name, family_name, role) values ('$user_name', '$given_name', '$family_name', '$institution_role_id')";
    $r = mysqli_query($l,$query);
}

// delete courses table if one has already been created
$query = "DROP TABLE Courses";
$r = mysqli_query($l,$query);

// recreate courses table
$query = "CREATE TABLE Courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    num_enrolled INT,
    UNIQUE (course_name)
    )";
$r = mysqli_query($l,$query);

// insert blackboard course data into table
foreach($c as $row) {

    // get course fields
    $course_name = $row->name;

    //echo $course_name."<br>";

    // insert fields into database
    $query = "INSERT INTO Courses (course_name, num_enrolled) values ('$course_name', 0)";
    $r = mysqli_query($l,$query);
}

// delete enrolled table if one has already been created
$query = "DROP TABLE Enrolled";
$r = mysqli_query($l,$query);

// recreate enrolled table
$query = "CREATE TABLE Enrolled (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    course_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_name) REFERENCES Students(user_name),
    FOREIGN KEY (course_name) REFERENCES Courses(course_name)
    )";
$r = mysqli_query($l,$query);

?>