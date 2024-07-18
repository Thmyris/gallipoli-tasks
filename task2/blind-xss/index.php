<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blind-XSS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div>
        <h1><a href="../index.html" style="color: black">< Back </a></h1>
    </div>
	<div>
        <h1><a href="./admin.php" style="color: black">Admin Panel</a></h1>
    </div>
    
    <form method="GET" action="">
        Feedback:
        <br>
        <textarea name="feedback" required style="width: 415px; height: 95px;"></textarea>
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_GET["feedback"])) {
        $feedback = $_GET['feedback'];
        $conn = mysqli_connect("localhost", "xssuser", "Secret_Pass0!", "xss_db");

        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }

        $sql = "INSERT INTO feedbacks (feedback) VALUES ('$feedback')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
        $conn->close();

    ?>

</body>
</html>
