<?php
$name = "dark";
if (!isset($_COOKIE[$name]))
  setcookie($name, "false", strtotime('Thu, 18 Dec 2030 12:00:00'), "/PatingGames");

$games = array(
  (object) [
    'title' => '2048',
    'desc' => 'A 2048 website game created by Fabian Richter',
  ], (object) [
    'title' => 'Canvas Tetris',
    'desc' => 'A tetris website game created by Dionysis Zindros'
  ], (object) [
    'title' => 'Monster Eating',
    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.'
  ], (object) [
    'title' => 'There Is No Game',
    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.'
  ], (object) [
    'title' => 'Ultra Pixel Survive',
    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.'
  ], (object) [
    'title' => 'Pixel Bear Adventure',
    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.'
  ], (object) [
    'title' => 'Red Tie Runner',
    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.'
  ]
);
?>


<!DOCTYPE html>

<head>
  <meta name="Viewport" content="width=device-width, initial-scale=1">
  <title>Home | PatingGames</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/homepage.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="script.js" defer></script>


</head>

<body>
  <?php require 'components/header.php' ?>
  <main>
    <ul id="categories" role="list">
      <?php
      $buttons = array("Arcade", "Adventure", "Casual", "Sports", "Puzzle", "Racing", "Shooter");

      foreach ($buttons as $name) {
        echo "<li><button class='" . strtolower($name) . "'>{$name}</button></li>";
      }
      ?>
    </ul>
    <ul id="list" role="list">
      <?php

      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['search'])) {
          $query = htmlentities($_GET['search']);
          searchGames($query);
        } else loadGames();
      }

      function searchGames($query)
      {
        clearGames();
        foreach ($GLOBALS['games'] as $game) {
          if (str_contains($game->title, $query)) {
            echo "<li class='card'>
            <div class='thumbnail'>
              <img src='https://placehold.co/200' alt='Game Thumbnail'>
            </div>
            <div class='info'>
              <h4>{$game->title}</h4>
              <p>{$game->desc}</p>
              <form action='game.php' method='get'>
                <button name='PlayButton' value='{$game->title}' type='submit'>PLAY</button>
              </form>
            </div>
          </li>";
          }
        }
      }

      function loadGames()
      {
        foreach ($GLOBALS['games'] as $game) {
          echo "<li class='card'>
            <div class='thumbnail'>
              <img src='https://placehold.co/200' alt='Game Thumbnail'>
            </div>
            <div class='info'>
              <h4>{$game->title}</h4>
              <p>{$game->desc}</p>
              <form action='game.php' method='get'>
                <button name='PlayButton' value='{$game->title}' type='submit'>PLAY</button>
              </form>
            </div>
          </li>";
        }
      }

      function clearGames()
      {
        echo "<script>
        const parent = document.getElementById('list');
        parent.innerHTML = '';
        </script>";
      }
      ?>
      <a class="backtop" href="#"><img src="./assets/img/backtop.svg" alt="Back to Top"></a>
  </main>
  <?php require 'components/footer.php' ?>
</body>

</html>