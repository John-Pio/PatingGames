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

    $dbname = "games";
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], null, $dbname);

    $GameChoice = htmlentities($_GET['game']);

    $query = "SELECT * FROM game WHERE title = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $GameChoice);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $selected = $result->fetch_object();
      $tags = explode(',', $selected->tags);

      echo "<iframe width='800' height='600' allowfullscreen src='{$selected->link}' frameborder='0' allowfullscreen='true' msallowfullscreen='true' mozallowfullscreen='true' webkitallowfullscreen='true' allowpaymentrequest='false' referrerpolicy='unsafe-url' sandbox='allow-same-origin allow-forms allow-scripts allow-pointer-lock allow-orientation-lock allow-popups' scrolling='no'></iframe>";

      echo "<section class='description'><h4>Game Description</h4>{$selected->long_descp}</section>";

      echo "<section class='tags'><h4>Tags</h4>";
      foreach ($tags as $tag) echo "<p>{$tag}</p>";
      echo "</section>";
    }

    $stmt->close();
    $conn->close();
    ?>
  </main>
  <?php require 'components/footer.php'; ?>
</body>

</html>