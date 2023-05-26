<!DOCTYPE html>
<html>
<head>
    <title>Student Information Management System</title>
    <style>
        body {
        width: 100%;
        height: 100vh;
        margin: 0;
        background-color: #1b1b32;
        color: #f5f6f7;
        font-family: Tahoma;
        font-size: 16px;
         }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 18px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }
        a{
            color: blue;
         }
        a:hover{
            color:white;
        }

    </style>
</head>
<body>
    <?php
    // Connect to the database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'student';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve student information from the database
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display student information in a table
        echo "<table>";
        echo "<tr><th>Name</th><th>Roll Number</th><th>Department</th><th>Hostel</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['roll_number'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td><a href = 'edit.php?id=". $row['id'] ." '> Edit </a> | <a href='delete.php?id=". $row['id']. "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No students found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <br>
    <a href="add.php">Add a new student</a>
</body>
</html>
