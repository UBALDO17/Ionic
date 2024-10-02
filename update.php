<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <?php
    include("connection.php");
    ?>
</head>

<body>
    <?php
    $id = $_GET['id'];

    // Use the correct column name for the join
    $query = "SELECT students.*, subjects.subject_id, subjects.subject_title, subjects.subject_desc, subjects.instruction
              FROM students
              LEFT JOIN subjects ON subject_id = subject_id  = '$id'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="update.php?id_get=<?php echo $id; ?>" method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
        <br><br>
        <label for="birth">Date of Birth:</label>
        <input type="date" name="birth" id="birth" value="<?php echo htmlspecialchars($row['date_of_birth']); ?>" required>
        <br><br>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" value="<?php echo htmlspecialchars($row['section']); ?>" required>
        <br><br>
        <label for="subject_title">Subject Title:</label>
        <input type="text" name="subject_title" id="subject_title" value="<?php echo htmlspecialchars($row['subject_title']); ?>" required>
        <br><br>
        <label for="subject_desc">Subject Description:</label>
        <input type="text" name="subject_desc" id="subject_desc" value="<?php echo htmlspecialchars($row['subject_desc']); ?>" required>
        <br><br>
        <label for="instruction">Instruction:</label>
        <input type="text" name="instruction" id="instruction" value="<?php echo htmlspecialchars($row['instruction']); ?>" required>
        <br><br>
        <input type="submit" name="Submit" value="Update">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_GET['id_get'];

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $birth = $_POST["birth"];
        $section = $_POST["section"];
        $subject_title = $_POST["subject_title"];
        $subject_desc = $_POST["subject_desc"];
        $instruction = $_POST["instruction"];

        $student_query = "UPDATE students SET first_name = '$fname', last_name = '$lname', date_of_birth = '$birth', section = '$section' = '$id'";
        $subject_id_query = "SELECT subject_id FROM subjects WHERE subject_id = '$id'";  // Make sure this is the correct column name
        $subject_id_result = mysqli_query($conn, $subject_id_query);
        if (mysqli_num_rows($subject_id_result) > 0) {
            $subject_row = mysqli_fetch_assoc($subject_id_result);
            $subject_id = $subject_row['subject_id'];
            $subject_query = "UPDATE subjects SET subject_title = '$subject_title', subject_desc = '$subject_desc', instruction = '$instruction' WHERE subject_id = '$subject_id'";
            if ($conn->query($student_query) && $conn->query($subject_query)) {
                echo "Updated Successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "No subjects found for this student.";
        }
    }
    ?>

    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>

</html>
