<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Encoding - Obfuscating</title>
</head>

<body>
  <div>
    <div>
      <h1><a href="../index.html" style="color: black;">
          < Back </a>
      </h1>
    </div>
    <form action="" method="GET">
      <input type="text" name="inputB64" required />
      <button type="submit">Base64</button>
    </form>

    <?php
    $params = $_GET;

    if (isset($params['inputB64'])) {
      $encodedInput = $params['inputB64'];
      $decodedInput = base64_decode($encodedInput);
      echo "<p style='display: none;'>" . $decodedInput . "</p>";
    }
    ?>

    <br>
    <form action="" method="GET">
      <input type="text" name="inputURL" required />
      <button type="submit">URL Encode</button>
    </form>
    <?php
    if (isset($params['inputURL'])) {
        $encodedInput = $params['inputURL'];
        $decodedInput = urldecode($encodedInput);
        echo "<p style='display: none;'>" . $decodedInput . "</p>";
    }
    ?>
    
    <br>
    <form action="" method="GET">
      <input type="text" name="inputHTML" required />
      <button type="submit">HTML Encode</button>
    </form>
    <?php
    if (isset($params['inputHTML'])) {
      $encodedInput = $params['inputHTML'];
        $decodedInput = htmlspecialchars_decode($encodedInput, ENT_QUOTES);
        echo "<p style='display: none;'>" . $decodedInput . "</p>";
    }
    ?>

    <br>
    <form action="" method="GET">
      <input type="text" name="inputB64HTML" required />
      <button type="submit">Base64 & HTML Encode</button>
    </form>
    <?php
    if (isset($params['inputB64HTML'])) {
      $encodedInput = $params['inputB64HTML'];
      $decodedInput = base64_decode(htmlspecialchars_decode($encodedInput, ENT_QUOTES));
      echo "You entered: " . $decodedInput;
    }
    ?>

    <br>
    <form action="" method="GET">
      <input type="text" name="inputB64URL" required />
      <button type="submit">Base64 & URL Encode</button>
    </form>
    <?php
    if (isset($params['inputB64URL'])) {
        $encodedInput = $params['inputB64URL'];

        $decodedInput = base64_decode(urldecode($encodedInput));
        echo "Decoded input: " . $decodedInput;
    }
    ?>

</body>

</html>
