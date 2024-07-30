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
        <input type="text" name="input" required>
        <button type="submit">Submit</button>
    </form>
    <div>
    <?php
      $userInput = isset($_GET['input']) ? $_GET['input'] : '';

      function filter1($input) {
        $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
        $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
        $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
        $filtered = str_replace(['javascript:', 'expression('], '', $filtered);
        $filtered = str_replace(['iframe', 'eval', 'onload', 'img', 'onclick'], '', $filtered);
        return $filtered;
      }
      function echo1($str) {
        echo filter1($str);
      }
        echo "<p>1 " .  htmlspecialchars(echo1($userInput)) . "</p>";
      ?>
    </div>
    <div>
    <?php
      function filter2($input) {
        $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
        $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
        $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
        $filtered = str_replace(['javascript:', 'expression('], '', $filtered);
        $filtered = str_replace(['iframe', 'eval', 'onmouseover', 'img', 'textarea', 'onclick'], '', $filtered);
        return $filtered;
      }
      function echo2($str) {
        echo filter2($str);
      }
        echo "<p>2 " .  htmlspecialchars(echo2($userInput), ENT_QUOTES) . "</p>";
    ?>
    </div>
    <div>
    <?php
      function filter3($input) {
        $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
        $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
        $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
        $filtered = str_replace(['expression('], '', $filtered);
        $filtered = str_replace(['iframe', 'eval', 'onload', 'onmouseover'], '', $filtered);
        return $filtered;
      }
        echo "<p style=\"font-size:30px;color:" . filter3($userInput) . ";\">set font color!</p>";
    ?>
    </div>
</body>
</html>
