<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/gamepage.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="script.js" defer></script>
</head>

<body>
  <?php

  require 'components/header.php';
  $GameChoice = $_GET['PlayButton'];
  if ($GameChoice == "YouHaveChosen2048") {
    echo
    '<main>
        <iframe src="games/2048.html" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" width="1280px" height="720px">
        </iframe>
    </main>';
  } else if ($GameChoice == "YouHaveChosenTetris") {
    echo
    '<main>
        <iframe src="games/tetris.html" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" width="1280px" height="720px">
        </iframe>
    </main>';
  } else {
    echo 'hello';
  }
  require 'components/footer.php';
  ?>
</body>

</html>