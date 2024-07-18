<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
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

        echo "<h2>XSS Payloads</h2><br><hr>";


        echo "<p> <strong>1. a href with mailto:\$userInput url scheme written inside</strong></p><br>";
        //someone@example.com?subject=Hello&body=><script>alert('XSS')</script>
        echo "<p> </p>
        <a href=mailto:\"$userInput\">Enter target email. Then click here to send your email</a>
        <hr>
        <br>";


        echo "<p><strong>IMG Tag with javascript protocol, payload:</strong> x\" onerror=\"javascript:alert('xss')</p>
        <br>";
        //x" onerror="javascript:alert('xss')
        echo "<p><img src=\"".$userInput."\"></p>
        <br>
        <hr>";

        
        echo "<p><strong>object data=\$userInput exploited with:</strong> `data:text/html;base64,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==`</p>
        <hr>
        <br>";
        //data:text/html;base64,PHNjcmlwdD5hbGVydCgxKTwvc2NyaXB0Pg==
        echo "<object data=$userInput></object>";
        

        echo "<p><strong>object type=\$userInput exploited with:</strong> `REDACTED` (because it breaks the page, check index.php source code)
        <hr>
        <br>";
        //image/svg+xml"><svg onload="alert('XSS')
        echo "<object type=\"" . $userInput . "\"></object>";




        echo "<p><strong>iframe src=\$userInput exploited with:</strong> `javascript:alert('xss')`</p>
        <hr>
        <br>";
        // //javascript:alert('xss')
        // //^^^^ hepsinde calisiyo url encoding falan yapmak lazim.
        // echo "<iframe src=\"" . $userInput . "\"></iframe>";


        echo "<p><strong>iframe src=\$userInput exploited with:</strong> `data:text/html;base64,PGJvZHkgb25sb2FkPWFsZXJ0KDEpPg==`</p>
        <hr>
        <br>";
        //data:text/html;base64,PGJvZHkgb25sb2FkPWFsZXJ0KDEpPg==
        echo "<iframe src=\"" . $userInput . "\"></iframe>";


        echo "<p><strong>iframe src=\$userInput exploited with:</strong> `data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxzY3JpcHQ+YWxlcnQoJ1hTUycpPC9zY3JpcHQ+PC9zdmc+`</p>
        <hr>
        <br>";
        //data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxzY3JpcHQ+YWxlcnQoJ1hTUycpPC9zY3JpcHQ+PC9zdmc+
        //^^^^ creates svg tag inside
        echo "<iframe src=\"" . $userInput . "\"></iframe>";
        


        # data:image/svg+xml;base64,PHN2ZyB4bWxuczpzdmc9Imh0dH A6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcv MjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hs aW5rIiB2ZXJzaW9uPSIxLjAiIHg9IjAiIHk9IjAiIHdpZHRoPSIxOTQiIGhlaWdodD0iMjAw IiBpZD0ieHNzIj48c2NyaXB0IHR5cGU9InRleHQvZWNtYXNjcmlwdCI+YWxlcnQoIlh TUyIpOzwvc2NyaXB0Pjwvc3ZnPg==
        echo "<p><strong>embed data:image/svg+xml;base64,PHN2Z</strong></p>
        <embed src=\"" . $userInput . "\"></embed>
        <hr>
        <br>";


  
        # data:text/html;base64,PHNjcmlwdD5hbGVydCgnWFNTJyk8L3NjcmlwdD4=
        // base64 encode : <script>alert('XSS')</script>
        echo "<p><strong>embed data:text/html;base64,PHNj...</strong></p>
        <embed src=\"$userInput\"></embed>
        <hr>
        <br>";
        


        // data:text/html;base64,amF2YXNjcmlwdDphbGVydCgp" onload="eval(atob(this.src.split(',')[1]))">
        // base64 encode : javascript:alert()
        echo "<p><strong>data:text/html;base64,amF2YX...</strong></p>
        <embed src=\"$userInput\"></embed>
        <hr>
        <br>";



        
        echo "<p><strong>a href=\$userInput exploited with </strong>`javascript:alert('xss')`</p><br><p>Has to be clicked.</p>
        <br>";
        //javascript:alert(1)
        echo "<p></p>
        <a href=\"$userInput\">LINK</a>
        <hr>
        <br>";







        //lanet olasi deneyler asagida
        // // 3. <svg> with different protocols
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
