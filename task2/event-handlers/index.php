<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Event Handlers</title>
</head>

<body>
  <div class="container">
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
           
      echo "<p>onload: </p><embed " . $userInput . "><br>";// onload
      echo "<p>onbegin: </p><svg " . $userInput . "></svg><br>";// onbegin
      echo "<p>onmouseover: </p><div " . $userInput . "\">Hover over me!</div><br>";

      echo "<p>User Interaction</p>";
      echo "<p>onclick: </p><button type='submit' " . $userInput . ">Click</button><br>"; // onclick
      echo "<p>: </p><a href='#' " . $userInput . ">Link</a><br>"; // 

      ?>
    </div>
  </div>
</body>
</html>
