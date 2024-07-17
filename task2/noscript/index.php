<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Noscript XSS</title>
</head>
<body>
    <div>
        <h1><a href="../index.html" style="color: black;">< Back </a></h1>
    </div>

    <form action="" method="GET">
        <input type="text" name="message" required />
        <button type="submit">Submit</button>
    </form>
    <div>
        <noscript>
        <?php       # </noscript><script>alert()</script>
            $userInput = isset($_GET['message']) ? $_GET['message'] : '';
            echo $userInput;
        ?>
        </noscript>
    </div>
</body>
</html>
