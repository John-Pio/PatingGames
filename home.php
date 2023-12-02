<?php
// Sets the dark mode cookie if does not exist
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
    <section>
      <div>
        <h3>Welcome to</h3>
        <h1>PatingGames</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quo iusto ut iste dolorum rem voluptates nobis similique ad tempora!</p>
        <a href="#categories">Browse now!</a>
      </div>
      <img src="assets/img/SharkLogo.svg" alt="Website Logo">
    </section>
    <ul id="categories" role="list">
      <?php
      // For echoing the category buttons
      $buttons = array("arcade", "adventure", "casual", "sports", "puzzle", "racing", "shooter");

      foreach ($buttons as $name) {
        echo "<li><form class='{$name}' method='post'><img src='assets/img/categories/{$name}.svg' alt='Category Icon'><input type='submit' name='category' value=" . ucfirst($name) . "></input></form></li>";
      }
      ?>
      <li>
        <form class="clear" method="post"><input type="submit" name="clear" value="Clear"></form>
    </ul>
    <ul id="list" role="list">
      <?php

      require_once 'components/games.php';

      // For clicking the clear button
      if (isset($_POST['clear'])) {
        clearGames();
        loadGames();
      }

      // For clicking from the categories
      if (isset($_POST['category'])) {
        searchGames('category', lcfirst($_POST['category']));
      }

      // Searching at the search bar
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['search'])) {
          $query = htmlentities($_GET['search']);
          searchGames('search', $query);
        } else loadGames();
      }

      function renderGames($game)
      {
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

      function searchGames($location, $query)
      {
        clearGames();

        $filtered = [];

        if ($location == 'category') {
          $filtered = array_filter($GLOBALS['games'], function ($game) use ($query) {
            return in_array($query, $game->tags);
          });
        } else {
          $filtered = array_filter($GLOBALS['games'], function ($game) use ($query) {
            return str_contains($game->title, $query);
          });
        }
        foreach ($filtered as $game) renderGames($game);
      }

      function loadGames()
      {
        foreach ($GLOBALS['games'] as $game) {
          renderGames($game);
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