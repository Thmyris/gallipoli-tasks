<?php
header('Content-Type: text/html');

// Get the User-Agent header
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reflected XSS Example</title>
</head>
<body>
    <h1>Welcome</h1>
    <p>Your User-Agent is: <?php echo $user_agent; ?></p>
</body>
</html>
