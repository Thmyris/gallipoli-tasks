<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div>
        <h1><a href="../index.html" style="color: black;">< Back </a></h1>
    </div>
    <h1>Leave a Comment</h1>
    <form id="commentForm">
        <textarea id="commentInput" placeholder="Enter your comment here" rows="10" cols="50"></textarea>
        <button type="submit">Submit</button>
    </form>
    <div id="comments">
    </div>

    <script>
        document.getElementById('commentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var comment = document.getElementById('commentInput').value;
            var commentsDiv = document.getElementById('comments');
            var commentElement = document.createElement('div');
            commentElement.className = 'comment';
            commentElement.innerHTML = comment;
            commentsDiv.appendChild(commentElement);
        });
    </script>
</body>
</html>
