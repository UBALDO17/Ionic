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
<h1>This is the adding page</h1>
<br>

<form action="Add.php" method="post">
    <label for="fname">First name:</label>
    <input type="text " name="fname" id="fname">
    <br><br>
    <label for="lname">last name:</label>
    <input type="text " name="lname" id="lname">
    <br><br>
    <label for="birth">Date of Birth:</label>
    <input type="date" name="birth" id="birth">
    <br><br>
    <label for="section">Section:</label>
    <input type="text " name="section" id="section">
    <input type="submit" name="Submit">
    <br><br>
</form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $birth = $_POST["birth"];
        $section = $_POST["section"];
    

    $query = "INSERT INTO students (first_name, last_name, date_of_birth, section) VALUES ('$fname','$lname','$birth','$section') ";

    if ($conn ->query($query)){
        echo "Added Successfully";
    }
    else{ 
        echo "Error";
}
    }
    
    ?>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>