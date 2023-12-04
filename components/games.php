<?php
// Initial data
$games = array(
  (object)[
    'title' => '2048',
    'descp' => 'Strategic incremental game.',
    'tags' => ['puzzle'],
    'link' => 'https://codepen.io/fabi_yo_/embed/zNrmwZ?default-tab=html%2Cresul',
    'thumbnail' => 'assets/img/thumbnail/2048.png',
  ], (object)[
    'title' => 'Canvas Tetris',
    'descp' => 'Classic Game remade for the web.',
    'tags' => ['puzzle'],
    'link' => 'https://dionyziz.com/graphics/canvas-tetris/',
    'thumbnail' => 'assets/img/thumbnail/tetris.png',
  ], (object)[
    'title' => 'Monster Eating',
    'descp' => 'Eat smaller monsters and avoid bigger ones!.',
    'tags' => ['arcade', 'featured'],
    'link' => 'https://games.construct.net/941/latest',
    'thumbnail' => 'assets/img/thumbnail/monster-eating.png',
  ], (object) [
    'title' => 'There Is No Game',
    'descp' => 'Unfortunately, there is no game.',
    'tags' => ['puzzle', 'featured'],
    'link' => 'https://games.construct.net/174/latest',
    'thumbnail' => 'assets/img/thumbnail/there-is-no-game.png',

  ], (object) [
    'title' => 'Ultra Pixel Survive',
    'descp' => 'Build barricades, furnaces and anvils to upgrade your weapons, collect resources like wood, stone and ores and evolve your favorite heroes!.',
    'tags' => ['shooter'],
    'link' => 'https://games.construct.net/26420/latest',
    'thumbnail' => 'assets/img/thumbnail/pixel-survive.png',
  ], (object) [
    'title' => 'Pixel Bear Adventure',
    'descp' => 'Join Pixel Bear on an epic adventure! Help him find his girlfriend, Peppermint!',
    'tags' => ['adventure'],
    'link' => 'https://games.construct.net/904/latest',
    'thumbnail' => 'assets/img/thumbnail/pixel-bear-adventure.png',
  ], (object) [
    'title' => 'Red Tie Runner',
    'descp' => 'Red Tie Runner is a simplistic, yet challenging, reflex-based, 2D platforming game..',
    'tags' => ['racing', 'arcade', 'featured'],
    'link' => 'https://games.construct.net/1463/latest',
    'thumbnail' => 'assets/img/thumbnail/red-tie-runner.png',
  ], (object) [
    'title' => 'Fireboy and Watergirl 1: Forest Temple',
    'descp' => 'Fireboy and Watergirl 1 is the first cooperative platformer game in the Fireboy and Watergirl series',
    'tags' => ['adventure', 'puzzle'],
    'link' => 'https://www.gameflare.com/embed/fireboy-and-watergirl-forest-temple',
    'thumbnail' => 'assets/img/thumbnail/fireboy-and-watergirl-forest-temple-icon.png',
  ], (object) [
    'title' => 'Age of War 2',
    'descp' => 'The game takes you back to different warfare ages. You start with the Stone Age where there are dinosaurs, stone, meteor showers, and cavemen.',
    'tags' => ['action', 'strategy'],
    'link' => 'https://www.gameflare.com/embed/age-of-war-2/',
    'thumbnail' => 'assets/img/thumbnail/age-of-war-2.png',
  ], (object) [
    'title' => 'Knife Hit',
    'descp' => 'A great little game, with a simple premise and controls. The difficulty scales up as you progress, with fun and straightforward unlocks.',
    'tags' => ['arcade'],
    'link' => 'https://y8.com/embed/knife_hit_',
    'thumbnail' => 'assets/img/thumbnail/knife-hit.png',
  ], (object) [
    'title' => 'Gold Miner',
    'descp' => 'Collect gold, stones, and minerals to reach your daily goal.',
    'tags' => ['casual'],
    'link' => 'https://www.gameflare.com/embed/gold-miner/',
    'thumbnail' => 'assets/img/thumbnail/gold-miner.png',
  ], (object) [
    'title' => 'Farm Frenzy 2',
    'descp' => 'Perfect your farming skills and increase the income of your agricultural complex!',
    'tags' => ['simulation'],
    'link' => 'https://www.gameflare.com/embed/farm-frenzy-2/',
    'thumbnail' => 'assets/img/thumbnail/farm-frenzy-2.png',
  ], (object) [
    'title' => '8 Ball Pool',
    'descp' => '8 Ball Pool is an addictive challenging game based on real 3D pool games.',
    'tags' => ['sports'],
    'link' => 'https://www.gameflare.com/embed/8-ball-pool-multiplayer/',
    'thumbnail' => 'assets/img/thumbnail/8-ball-pool.png',
  ],
);

$servername = "localhost";
$username = "root";
$conn = new mysqli($servername, $username);

if ($conn->connect_error) {
  die("Connection failed: {$conn->connect_error}");
}

$query = "CREATE DATABASE IF NOT EXISTS games";
mysqli_query($conn, $query);
$db_selected = mysqli_select_db($conn, "games");

$query = "CREATE TABLE IF NOT EXISTS game (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  descp TEXT,
  tags TEXT,
  link VARCHAR(255),
  thumbnail VARCHAR(255)
);";
mysqli_query($conn, $query);

// Check table if it is empty
$query = "SELECT COUNT(*) as count FROM game";
$results = mysqli_query($conn, $query);

if ($results->num_rows > 0) {
  $row = $results->fetch_assoc();
  $count = $row["count"];

  // If the table is empty, insert data from the games array
  if ($count == 0) {
    foreach ($games as $data) {
      $title = $conn->real_escape_string($data->title);
      $descp = $conn->real_escape_string($data->descp);
      $tags = $conn->real_escape_string(implode(',', $data->tags));
      $link = $conn->real_escape_string($data->link);
      $thumbnail = $conn->real_escape_string($data->thumbnail);

      // Insert data into the table
      $query = "INSERT INTO game (title, descp, tags, link, thumbnail)
      VALUES ('$title', '$descp', '$tags', '$link', '$thumbnail');";

      if (mysqli_query($conn, $query) !== TRUE) {
        echo "Error inserting data: " . $conn->error;
        break;
      }
    }
  }
}

$conn->close();
