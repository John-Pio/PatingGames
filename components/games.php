<?php
// Initial data
$games = array(
  (object)[
    'title' => '2048',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['puzzle'],
    'link' => 'https://codepen.io/fabi_yo_/embed/zNrmwZ?default-tab=html%2Cresul',
  ], (object)[
    'title' => 'Canvas Tetris',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['puzzle'],
    'link' => 'https://dionyziz.com/graphics/canvas-tetris/',
  ], (object)[
    'title' => 'Monster Eating',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['arcade', 'featured'],
    'link' => 'https://games.construct.net/941/latest',
  ], (object) [
    'title' => 'There Is No Game',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['puzzle', 'featured'],
    'link' => 'https://games.construct.net/174/latest'
  ], (object) [
    'title' => 'Ultra Pixel Survive',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['shooter'],
    'link' => 'https://games.construct.net/26420/latest'
  ], (object) [
    'title' => 'Pixel Bear Adventure',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['adventure'],
    'link' => 'https://games.construct.net/904/latest'
  ], (object) [
    'title' => 'Red Tie Runner',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['racing', 'arcade', 'featured'],
    'link' => 'https://games.construct.net/1463/latest'
  ], (object) [
    'title' => 'Fireboy and Watergirl 1: Forest Temple',
    'descp' => 'Lorem ipsum dolor sit amet.',
    'tags' => ['adventure', 'puzzle'],
    'link' => 'https://www.gameflare.com/embed/fireboy-and-watergirl-forest-temple'
  ], (object) [
    'title' => 'Age of War 2',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['action', 'strategy'],
    'link' => 'https://www.gameflare.com/embed/age-of-war-2/'
  ], (object) [
    'title' => 'Knife Hit',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['arcade'],
    'link' => 'https://y8.com/embed/knife_hit_'
  ], (object) [
    'title' => 'Gold Miner',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['casual'],
    'link' => 'https://www.gameflare.com/embed/gold-miner/'
  ], (object) [
    'title' => 'Farm Frenzy 2',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['simulation'],
    'link' => 'https://www.gameflare.com/embed/farm-frenzy-2/'
  ], (object) [
    'title' => '8 Ball Pool',
    'descp' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    'tags' => ['sports'],
    'link' => 'https://www.gameflare.com/embed/8-ball-pool-multiplayer/'
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
  link VARCHAR(255)
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

      // Insert data into the table
      $query = "INSERT INTO game (title, descp, tags, link)
      VALUES ('$title', '$descp', '$tags', '$link');";

      if (mysqli_query($conn, $query) !== TRUE) {
        echo "Error inserting data: " . $conn->error;
        break;
      }
    }
  }
}

$conn->close();
