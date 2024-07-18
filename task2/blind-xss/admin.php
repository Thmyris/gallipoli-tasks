<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blind-XSS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <div>
            <h1><a href="./index.php" style="color: black">< Back </a></h1>
        </div>
        <div>
            <h1>Admin Panel</h1>
            <h2>Feedbacks</h2>
        </div>
        <?php
        $conn = mysqli_connect("localhost", "xssuser", "Secret_Pass0!", "xss_db");

        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }

        $sql = "SELECT feedback FROM feedbacks";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row["feedback"] . "<br>";
            }
        } else {
            echo "Feedback not found!";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
