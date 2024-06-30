<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM-Based XSS Example with Headers</title>
</head>
<body>
    <h1>Welcome to the DOM-Based XSS Example Page</h1>
    <p id="user-agent-message">Hello! Your 'user-agent' is: null</p>
    <p id="referer-message">Hello! Your 'referer' is: null</p>
    <script>
        // Get the User-Agent and Referer headers and set them as the content of the <p> elements
        var userAgent = '<?php echo $_SERVER['HTTP_USER_AGENT']; ?>';
        var referer = '<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'null'; ?>';
        document.getElementById('user-agent-message').innerHTML = "Hello! Your 'user-agent' is: " + userAgent;
        document.getElementById('referer-message').innerHTML = "Hello! Your 'referer' is: " + referer;
    </script>
</body>
</html>
