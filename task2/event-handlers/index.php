<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Event Handlers</title>
</head>

<body>
  <div>
    <div>
      <h1><a href="../index.html" style="color: black;">< Back </a></h1>
    </div>
    <form action="" method="GET">
      <input type="text" name="input" required />
      <button type="submit">Submit</button>
    </form>
    <div>
      <?php
        $userInput = isset($_GET['input']) ? $_GET['input'] : '';
        $decoded = urldecode($userInput); 
        $ddecoded = urldecode(urldecode($userInput));
        $replaced = str_replace(">", "&gt;", $userInput);
        $replaced2 = str_replace("\"", "", $userInput);

        # onerror : iki kez url encode edilmiş payload : %2522%2520onerror=%2522alert()
        echo "<p>get a picture with url: </p>
        <img src=\"" . $decoded . "\">
        <hr>
        <br>";

        // # base64 png escape payload:Ij48aW1nIHNyYz14IG9uZXJyb3I9YWxlcnQoJ1hTUycpPg==
        // echo "<p>base64 png : </p>
        // <img src=\"data:image/png;base64," . $userInput . "\">
        // <hr>
        // <br>";

        # onload : %22+onload=%22alert()
        echo "<p>Svg height: </p>
        <svg height=\"" . $replaced . "\" width=\"100\" xmlns=\"http://www.w3.org/2000/svg\">
          <circle r=\"45\" cx=\"50\" cy=\"50\" stroke=\"green\" stroke-width=\"3\" fill=\"red\" \"/>
        </svg>
        <hr>
        <br>";

        # double encode: %2522%2520onloadstart=%2522alert()
        echo "<p>Double encoded payload girer misin karşim?</p>
        <video src=\"" . $ddecoded . "\" autoplay></video>
        <hr>
        <br>";

        # vur.mp3" onplay="alert()"
        echo "<p>dinlemek istediginiz mehteri inputa giriniz:
        kayitli mehterler
        vur.mp3 x.mp3</p>
        <audio src=\"" . $userInput . "\" autoplay></audio>
        <hr>
        <br>";

        # onfocus payload : "+onfocus="javascript:alert()
        echo "<p>set link: </p>
        <a href=\"" . $userInput . "\" autofocus>Link</a>
        <hr>
        <br>";

        # USER INTERACTION
        # onclick base64 encoded payload: IiBvbmNsaWNrPSJhbGVydCgp
        echo "<p>Set button link: </p>
        <form action=\"\" method=\"get\">
        <button type=\"submit\" formaction=\"" . base64_decode($replaced2) . "\">Click</button>
        </form>
        <br>";

        # onchange payload : %22+onchange=%22alert()
        echo "<p>Set placeholder</p>
        <input type=\"text\" placeholder=\"" . $userInput . "\" />
        <hr>
        <br>";
      ?>
    </div>
  </div>
</body>
</html>
