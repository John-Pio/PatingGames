<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    echo htmlentities($_GET['game']);
    ?> | PatingGames
  </title>
  <link rel="stylesheet" href="assets/css/gamepage.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <script src="script.js" defer></script>
</head>

<body>
  <?php require 'components/header.php'; ?>
  <main>
    <?php
    require_once 'components/database.php';

    $conn = new mysqli($hostname, $username, $password, $database);

    $GameChoice = htmlentities($_GET['game']);

    $query = "SELECT * FROM game WHERE title = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $GameChoice);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $selected = $result->fetch_object();
      $tags = explode(',', $selected->tags);

      echo "<section class='game'>";
      echo "<iframe class='full-width' src='{$selected->link}'></iframe>";
      echo "<h1>{$selected->title}</h1>";
      echo "<p>{$selected->long_descp}</p>";
      echo "</section>";

      echo "<section class='tags'><h3>Tags</h3>";
      echo "<article>";
      foreach ($tags as $tag) echo "<p>{$tag}</p>";
      echo "</article></section>";
    }

    $stmt->close();
    $conn->close();
    ?>
  </main>
  <?php require 'components/footer.php'; ?>
</body>

</html>