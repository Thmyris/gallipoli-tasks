<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Protocols and HTML Tags</title>
</head>

<body>
    <div>
        <div>
            <h1><a href="../index.html" style="color: black;">
                    < Back </a>
            </h1>
        </div>
        <div>
            <form action="" method="GET">
            <input type="text" name="input" required />
            <button type="submit">Submit</button>
            </form>
        </div>
        <div>
        <?php
        if (isset($_GET['input']) && $_GET['input'] != '') {
            $userInput = $_GET['input'];

//            echo "<a href='#' " . $userInput . ">Link</a>";
            echo "<img src=" . $userInput . ">";
            echo "<iframe src= " . $userInput . "></iframe>";
        }
        ?>
        </div>
    </div>
</body>

</html>
