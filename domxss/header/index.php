<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM-Based XSS Example with Headers</title>
</head>
<body>
    <h1>Welcome to the DOM-Based XSS Example Page</h1>
    <p id="user-agent-message">
        <?php
        // Get the User-Agent header and print it inside the <p> element
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        echo "Hello! Your 'user-agent' is: " . $userAgent;
        ?>
    </p>
    <p id="referer-message">
        <?php
        // Get the Referer header and print it inside the <p> element
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'null';
        echo "Hello! Your 'referer' is: " . $referer;
        ?>
    </p>
</body>
</html>
