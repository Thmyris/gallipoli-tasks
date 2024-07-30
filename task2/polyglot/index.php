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
        $filtered = str_replace(['iframe', 'eval', 'onload', 'img', 'onclick', 'onmouseout', 'ondblclick'], '', $filtered);
        return $filtered;
      }
      function echo1($str) {
        echo filter1($str);
      }
        echo "<p>" .  htmlspecialchars(echo1($userInput)) . "</p>";
      ?>
    </div>
    <div>
    <?php
      function filter2($input) {
        $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
        $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
        $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
        $filtered = str_replace(['javascript:', 'expression('], '', $filtered);
        $filtered = str_replace(['iframe', 'eval', 'onclick', 'onmouseover', 'img', 'textarea', 'onclick', 'onmouseout', 'ondblclick'], '', $filtered);
        return $filtered;
      }
        echo "<script>var str =\" " .  filter2($userInput) . "\";</script>";
    ?>
    </div>
    <div>
    <?php
      function filter3($input) {
        $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
        $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
        $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
        $filtered = str_replace(['expression('], '', $filtered);
        $filtered = str_replace(['iframe', 'eval', 'onload', 'onmouseover', 'onmouseout', 'ondblclick', 'onclick'], '', $filtered);
        return $filtered;
      }
        echo "<input type='text' placeholder='input a text' value='" . filter3($userInput) . "'>";
    ?>
    </div>
    <div>
    <?php
      function filter4($input) {
        $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
        $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
        $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
        $filtered = str_replace(['expression('], '', $filtered);
        $filtered = str_replace(['iframe', 'eval', 'onload', 'onmouseover', 'ondblclick'], '', $filtered);
        return $filtered;
      }
        echo "<a href=\"" . filter4($userInput) . "\">set link</a>";
    ?>
    </div>
    <div>
    <?php
      function filter5($input) {
        $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
        $filtered = preg_replace('/on\w+\s*=\s*"(?:.|\n)*?"/i', '', $filtered);
        $filtered = preg_replace('/data:\s*[^\s]*?base64[^\s]*/i', '', $filtered);
        $filtered = str_replace(['expression('], '', $filtered);
        $filtered = str_replace(['iframe', 'eval', 'onload', 'onmouseover', 'onclick'], '', $filtered);
        return $filtered;
      }
        echo "add comment line";
        echo "<!--" . filter5($userInput) . "-->";
    ?>
    </div>
</body>
</html>
