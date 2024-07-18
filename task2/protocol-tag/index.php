<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>XSS Test Cases</title>
</head>
<body>
  <div>
    <div>
      <h1><a href="../index.html" style="color: black;">&lt; Back </a></h1>
    </div>
    <form action="" method="GET">
      <input type="text" name="input" required />
      <button type="submit">Submit</button>
    </form>
    <div>
      <?php
        $userInput = isset($_GET['input']) ? $_GET['input'] : '';

        echo "<h2>XSS Payloads</h2><br>";

        // 1. <img> with different protocols
        echo "<p><strong>IMG Tag with javascript protocol, payload:</strong> x\" onerror=\"javascript:alert('xss')</p>
        <br>";
        echo "<p><img src=\"".$userInput."\"></p>
        <br>
        <hr>";

        //data:text/html;base64,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==
        echo "<object data=\"" . $userInput . "\"></object>";
        

        // echo "<p><strong>IMG Tag with data:text/html protocol, payload:</strong> data:text/html;base64," . base64_encode("<img src='x' onerror='alert(\"xss\")'>") . "</p>
        // <br>";
        // //echo "<p><img src=\"data:text/html;base64," . base64_encode($userInput) . "\"></p>
        // //use alt and url/html encoding maybe
        // echo "<p><img src=\"" . ($userInput) . "\"></p>
        // <br>
        // <hr>";

        // echo "<p><strong>IMG Tag with http protocol, payload:</strong> http://example.com/xss</p>
        // <br>";

        // echo "<p><img src=\"http://example.com/" . $userInput . "\"></p>
        // <hr>
        // <br>";

        // // 2. <a> with different protocols
        // echo "<p><strong>A Tag with javascript protocol, payload:</strong> javascript:alert('xss')</p>
        // <br>";
 
        // echo "<p><a href=\"" . $userInput . "\">Click me</a></p>
        // <hr>
        // <br>";

        // echo "<p><strong>A Tag with data:text/html protocol, payload:</strong> data:text/html;base64," . base64_encode("javascript:alert('xss')") . "</p>
        // <br>";

        // echo "<p><a href=\"data:text/html;base64," . base64_encode($userInput) . "\">Click me</a></p>
        // <hr>
        // <br>";

        // echo "<p><strong>A Tag with http protocol, payload:</strong> http://example.com/xss</p>
        // <br>";

        // echo "<p><a href=\"http://example.com/" . $userInput . "\">Click me</a></p>
        // <hr>
        // <br>";

        // // 3. <svg> with different protocols
        // echo "<p><strong>SVG Tag with javascript protocol, payload:</strong> javascript:alert('xss')</p>
        // <br>";

        // echo "<p><svg height=\"" . $userInput . "\" width=\"100\" xmlns=\"http://www.w3.org/2000/svg\"><circle r=\"45\" cx=\"50\" cy=\"50\" stroke=\"green\" stroke-width=\"3\" fill=\"red\" /></svg></p>
        // <hr>
        // <br>";

        // echo "<p><strong>SVG Tag with data:text/html protocol, payload:</strong> data:text/html;base64," . base64_encode("<svg onload='alert(\"xss\")'>") . "</p>
        // <br>";

        // echo "<p><svg height=\"100\" width=\"100\"><circle r=\"" . $userInput . "\" cx=\"50\" cy=\"50\" stroke=\"green\" stroke-width=\"3\" fill=\"red\" /></svg></p>
        // <hr>
        // <br>";

        // echo "<p><strong>SVG Tag with http protocol, payload:</strong> http://example.com/xss</p>
        // <br>";

        // echo "<p><svg height=\"100\" width=\"100\"><circle r=\"" . $userInput . "\" cx=\"50\" cy=\"50\" stroke=\"green\" stroke-width=\"3\" fill=\"red\" /></svg></p>
        // <hr>
        // <br>";

        // // Test Tags
        // echo "<h2>Test Tags</h2>";

        // echo "<p><strong>BODY Tag with onMouseOver event, payload:</strong> body onMouseOver=\"javascript:alert('xss')\"</p>
        // <br>";

        // echo "<p><body onMouseOver=\"" . $userInput . "\"></body></p>
        // <hr>
        // <br>";
      ?>
    </div>
  </div>
</body>
</html>
