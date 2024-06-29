<?php
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>XSS Header Injection</title>
</head>

<body>
    <div class="container">
        <div>
            <h1><a href="../../index.html" style="color: black;">
                    < Back </a>
            </h1>
        </div>
        <div>
            <h1>XSS Header Injection</h1>
        </div>
        <div>
            <h4>Your User-Agent is: <?php echo $user_agent; ?></h4>
        </div>
    </div>
</body>

</html>