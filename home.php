<?php
// Main Page
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>
    <h1>This is the Main Page</h1>
    <h3>Student Information</h3>
    <br>

    <a href="add.php"><button>Add Students</button></a>

    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Section</th>
            <th>Subject ID</th>
            <th>Subject Title</th>
            <th>Subject Description</th>
            <th>Instructor</th>
            <th>Actions</th>
        </tr>

        <?php
        // Join students and subjects tables to get complete information
        $query = "
            SELECT students.student_id, students.first_name, students.last_name, students.date_of_birth, students.section,
                   subjects.subject_id, subjects.subject_title, subjects.subject_desc, subjects.instruction
            FROM students
            LEFT JOIN subjects ON student_id = subject_id";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['date_of_birth']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td><?php echo isset($row['subject_id']) ? $row['subject_id'] : 'N/A'; ?></td>
                <td><?php echo isset($row['subject_title']) ? $row['subject_title'] : 'N/A'; ?></td>
                <td><?php echo isset($row['subject_desc']) ? $row['subject_desc'] : 'N/A'; ?></td>
                <td><?php echo isset($row['instruction']) ? $row['instruction'] : 'N/A'; ?></td>
                <td>
                    <a href="delete1.php?id=<?php echo $row['student_id']; ?>">Delete</a> 
                    <a href="update.php?id=<?php echo $row['student_id']; ?>">Update</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>
