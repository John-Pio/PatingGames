<?php
$name = "dark";
if (!isset($_COOKIE[$name]))
  setcookie($name, "false", strtotime('Thu, 18 Dec 2030 12:00:00'), "/PatingGames");
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
    <ul role="list">
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveChosen2048" type="submit">PLAY</button>
          </form>
        </div>
      </li>
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveChosenTetris" type="submit">PLAY</button>
          </form>
        </div>
      </li>
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveChosenMonsterEating" type="submit">PLAY</button>
          </form>
        </div>
      </li>
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveChosenThereIsNoGame" type="submit">PLAY</button>
          </form>
        </div>
      </li>
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveChosenUltraPixelSurvive" type="submit">PLAY</button>
          </form>
        </div>
      </li>
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveChosenPixelBearAdventure" type="submit">PLAY</button>
          </form>
        </div>
      </li>
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveRedTieRunner" type="submit">PLAY</button>
          </form>
        </div>
      </li>
      <li class="card">
        <div class="thumbnail">
          <img src="https://placehold.co/200" alt="Game Thumbnail">
        </div>
        <div class="info">
          <h4>Lorem, ipsum.</h4>
          <p>Lorem ipsum dolor sit.</p>
          <form action='game.php' method='get'>
            <button name="PlayButton" value="YouHaveChosenTetris" type="submit">PLAY</button>
          </form>
        </div>
      </li>
  </main>
  <?php require 'components/footer.php' ?>
</body>

</html>