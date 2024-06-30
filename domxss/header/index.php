<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM Based XSS</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
	<div>
            <h1><a href="../../index.html" style="color: black">< Back </a></h1>
        </div>
        <p id="user-agent-message">Hello! Your 'user-agent' is: null</p>
        <p id="referer-message">Hello! Your 'referer' is: null</p>
    </div>
    <script>
        var userAgent = '<?php echo $_SERVER['HTTP_USER_AGENT']; ?>';
        var referer = '<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'null'; ?>';
        document.getElementById('user-agent-message').innerHTML = "<b>Your 'user-agent' is: </b>" + userAgent;
        document.getElementById('referer-message').innerHTML = "<b>Your 'referer' is: </b>" + referer;
    </script>
</body>
</html>

