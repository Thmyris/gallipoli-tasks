<?php
$userInput = isset($_GET['message']) ? $_GEt['message'] : '';
function filterXSS($input) {
    $filtered = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    $filtered = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $filtered);
    return $filtered;
}

function filterNoscriptContent($input) {
    return $input;
}

function echoFiltered($str, $isNoscript = false) {
    if ($isNoscript) {
        echo filterNoscriptContent($str);
    } else {
        echo filterXSS($str);
    }
}
?>

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

    <?php if (!empty($userInput)): ?>
        <div>
            <noscript>
                <?php echoFiltered($userInput, true); ?>
            </noscript>
            <script>
                document.write("<?php echo str_replace('"', '\\"', filterXSS($userInput)); ?>");
            </script>
        </div>
    <?php endif; ?>

    <form action="" method="GET">
      <input type="text" name="message" required />
      <button type="submit">Submit</button>
    </form>
    <div>
      <?php echo htmlspecialchars($userInput); ?>
    </div>
</body>
</html>
