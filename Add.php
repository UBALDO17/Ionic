<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <?php
    include("connection.php");
    ?>
</head>

<body>
    <h1>This is the Adding Page</h1>
    <br>

    <form action="add.php" method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" required>
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" required>
        <br><br>
        <label for="birth">Date of Birth:</label>
        <input type="date" name="birth" id="birth" required>
        <br><br>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" required>
        <br><br>
        <label for="subject_title">Subject Title:</label>
        <input type="text" name="subject_title" id="subject_title" required>
        <br><br>
        <label for="subject_desc">Subject Description:</label>
        <input type="text" name="subject_desc" id="subject_desc" required>
        <br><br>
        <label for="instruction">Instruction:</label>
        <input type="text" name="instruction" id="instruction" required>
        <br><br>
        <input type="submit" name="Submit" value="Add Student">
        <br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $birth = $_POST["birth"];
        $section = $_POST["section"];
        $subject_title = $_POST["subject_title"];
        $subject_desc = $_POST["subject_desc"];
        $instruction = $_POST["instruction"];

        // Insert into students table
        $student_query = "INSERT INTO students (first_name, last_name, date_of_birth, section) VALUES ('$fname', '$lname', '$birth', '$section')";
        if ($conn->query($student_query)) {
            // Get the last inserted student ID
            $student_id = $conn->insert_id;

            // Insert into subjects table using subject_id instead of student_id
            $subject_query = "INSERT INTO subjects (subject_title, subject_desc, instruction, subject_id) VALUES ('$subject_title', '$subject_desc', '$instruction', '$student_id')";

            if ($conn->query($subject_query)) {
                echo "Added Successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>

</html>
