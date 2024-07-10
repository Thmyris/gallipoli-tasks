<?php
function filterXSS($input) {
    $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
    $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
    $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
    $filtered = str_replace(['javascript:', 'expression('], '', $filtered);
    $filtered = str_replace(['img', 'svg', 'iframe', 'eval', 'onload'], '', $filtered);
    return $filtered;
}
$userInput = isset($_GET['bio']) ? $_GET['bio'] : '';
function unsafeEcho($str) {
    echo filterXSS($str);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Polyglot XSS</title>
</head>
<body>
    <div>
      <h1><a href="../index.html" style="color: black;">< Back </a></h1>
    </div>
  <form action="" method="GET">
      <input type="text" name="bio" required>
      <button type="submit">Submit</button>
  </form>
  <div>
    <?php echo htmlspecialchars(unsafeEcho($userInput)); ?>
  </div>
</body>
</html>
