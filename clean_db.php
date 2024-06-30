<?php
function clean_db()
{
  $servername = "localhost";
  $username = "ubuntu";
  $password = "Secret_Pass0!";
  $dbname = "xss_db";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $delete_query = "DELETE FROM comments;";
  mysqli_query($conn, $delete_query);

  $delete_query = "DELETE FROM headers;";
  mysqli_query($conn, $delete_query);


  mysqli_close($conn);
}

clean_db();
