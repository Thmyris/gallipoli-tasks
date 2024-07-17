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

    <?php 
      $params = $_GET;
    ?>

    <form action="" method="GET">
      <input type="text" name="inputB64" required />
      <button type="submit">Base64</button>
    </form>
    <?php
    # b64 encoded : PHNjcmlwdD5hbGVydCgpPC9zY3JpcHQ+
    if (isset($params['inputB64'])) {
      $b64decoded = base64_decode($params['inputB64']);
      echo "<p style='display: none;'>" . $b64decoded . "</p>";
    }
    ?>

    <br>
    <hr>
    <form action="" method="GET">
      <input type="text" name="inputURL" required />
      <button type="submit">URL Encode</button>
    </form>
    <?php
    # url encoded : %3Cscript%3Ealert()%3C/script%3E
    if (isset($params['inputURL'])) {
        $urldecoded = urldecode($params['inputURL']);
        echo "<p style='display: none;'>" . $urldecoded . "</p>";
    }
    ?>

    <br>
    <hr>
    <form action="" method="GET">
      <input type="text" name="inputHTML" required />
      <button type="submit">HTML Encode</button>
    </form>
    <?php
    # html encoded : &lt;script&gt;alert()&lt;/script&gt;
    if (isset($params['inputHTML'])) {
        $htmldecoded = html_entity_decode($params['inputHTML'], ENT_QUOTES | ENT_HTML5);
        echo "<p style='display: none;'>" . $htmldecoded . "</p>";
    }
    ?>

    <br>
    <hr>
    <form action="" method="GET">
      <input type="text" name="inputB64HTML" required />
      <button type="submit">Base64 & HTML Encode</button>
    </form>
    <?php
    # html & b64 encoded : Jmx0O3NjcmlwdCZndDthbGVydCZscGFyOyZycGFyOyZsdDsmc29sO3NjcmlwdCZndDs=
    if (isset($params['inputB64HTML'])) {
      $b64htmldecoded = html_entity_decode(base64_decode($params['inputB64HTML']), ENT_QUOTES | ENT_HTML5);
      echo "<p style='display: none;'>" . $b64htmldecoded . "</p>";
    }
    ?>

    <br>
    <hr>
    <form action="" method="GET">
      <input type="text" name="inputB64URL" required />
      <button type="submit">Base64 & URL Encode</button>
    </form>
    <?php
    # url & base64 encoded : JTNDc2NyaXB0JTNFYWxlcnQoKSUzQy9zY3JpcHQlM0U=
    if (isset($params['inputB64URL'])) {
        $b64urldecoded = urldecode(base64_decode($params['inputB64URL']));
        echo "<p style='display: none;'>" . $b64urldecoded . "</p>"; 
    }
    ?>

    <br>
    <hr>
    <form action="" method="GET">
      <input type="text" name="inputHTML4URL" required />
      <button type="submit">HTML & URL Encode</button>
    </form>
    <?php
    # html & url encoded : &percnt;3Cscript&percnt;3Ealert&lpar;&rpar;&percnt;3C&sol;script&percnt;3E
    if (isset($params['inputHTML4URL'])) {
      $htmlurldecoded = urldecode(html_entity_decode($params['inputHTML4URL'], ENT_QUOTES | ENT_HTML5));
      echo "<p style='display: none;'>" . $htmlurldecoded . "</p>";
    }
    ?>

</body>
</html>
