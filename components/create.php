<a href="../home.php">Back to home</a><br>
<?php

$conn = new mysqli("localhost", "root", null, "games");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve values from the form
  $title = $_POST["title"];
  $descp = $_POST["descp"];
  $longDescp = $_POST["long-descp"];
  $tags = $_POST["tags"];
  $link = $_POST["link"];

  // Handle image upload
  $folder = "assets/img/thumbnail/";
  $directory = "C:/xampp/htdocs/PatingGames/$folder";
  $thumbnail = $directory . basename(($_FILES["image"]["name"]));

  // Move the upload file to the directory
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $thumbnail)) {
    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

  $query = "INSERT INTO game (title, descp, tags, link, thumbnail, long_descp) VALUES (?, ?, ?, ?, ?, ?)";

  $thumbnail = $folder . basename(($_FILES["image"]["name"]));
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ssssss", $title, $descp, $tags, $link, $thumbnail, $longDescp);

  if (mysqli_stmt_execute($stmt)) {
    echo "Record inserted successfully.";
  } else {
    echo "Error: " . mysqli_stmt_error($stmt);
  }

  mysqli_stmt_close($stmt);
}

$conn->close();
