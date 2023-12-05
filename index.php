<?php

require_once 'components/database.php';

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
  <dialog id="add-dialog">
    <h4>Add a Game!</h4>
    <form action="#list" method="post" enctype=multipart/form-data>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" required>
      <label for="descp">Short Description</label>
      <input type="text" name="descp" id="descp" required>
      <label for="tags">Tags</label>
      <input type="text" name="tags" id="tags" required>
      <label for="link">Game Link</label>
      <input type="text" name="link" id="link" required>
      <label for="long-descp">Long Description</label>
      <textarea name="long-descp" id="long-descp" cols="30" rows="10" required></textarea>
      <label for="image">Thumbnail</label>
      <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
      <div>
        <input type="submit" value="Submit" name="submit">
        <button type="button" id="close-add-dialog">Close</button>
      </div>
    </form>
  </dialog>
  <?php require 'components/header.php' ?>
  <main>
    <section>
      <div>
        <h3>Welcome to</h3>
        <h1>PatingGames</h1>
        <p>We, The Team Pating are passionate about bringing fun and interactive gaming experiences to your browser using the power of HTML, CSS, and PHP. Whether you're a casual gamer or a seasoned pro, there's something here for everyone. Join us on this gaming journey!</p>
        <a href="#categories">Browse now!</a>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800" xmlns:v="https://vecta.io/nano">
        <path d="M219.1 202.5c-91.2 42.2-157 108.2-156.4 124.2.3 8.3 4.5 23.2 16.6 35.9 7.1 7.5 26 21.2 39.3 22 13.2.8 108.8-62.9 108.8-62.9l95.2-13.2 57.9 138.2s19 27.3 45.5 49.7 52.1 29.8 57.9 24.8-11.2-38.5-12.4-47.1c-1.6-11.5-6.6-39.7 21.5-35.6 28.2 4.2 80.3 24.8 80.3 55.4s-20.7 64.5-79.4 64.5-141.5-19-179.6-17.4-72 4.9-106.7 19c-25.7 10.4-54.6 29.8-53.8 32.3s33.1 13.2 71.2 18.2 111.7 4.1 124.1 22.3 15.7 44.4 11.6 83.3-2.5 70.6-1.6 70.6c.8 0 33.3-18.6 49.7-47.1 26.5-46.3 26.5-102.6 36.4-114.2s51.1-14.8 84.4-19C563.8 602 758 594 758 400.4c0-155.6-148.1-190.3-151.4-193.6s-8.7-27.6 2.5-49.7c8.8-17.4 23.7-43.9 19-50.5-5.8-8.2-59.6.8-99.3 21.5S464 175.2 464 175.2s-152.6-15.3-244.9 27.3h0z" fill="#9a9a9a" />
        <path d="M242.3 285.2c30.2-13.3 79.5-24.2 116.7-26.5 66.6-4.1 123.3 3.7 123.3 3.7s24.2 50.5 43.9 75.7c34.3 44.1 83.8 78.2 90.4 68.7 5.5-7.9 1.1-49.7-7.6-75.3-4.3-12.6-18.2-46.3-18.2-46.3s60.4 4.9 95.2 54.6c34.7 49.7 48.8 154.8-27.3 199.4-66.4 39-103.7 33.2-103.7 33.2s39.7-43.9 33.4-74.8c-6.6-32.6-21-41.4-45.8-46.1-15.7-2.9-150.4 0-185.9-.8s-89.1-3.3-126.1-14.6c-17.7-5.4-30.3-13.8-30.3-13.8l.8-29.8s-30.3 6.1-47.7 4.4c-17.4-1.6-41.9-11.6-43.6-14s19.6-21 37.3-34.7c22.1-17.2 59.6-47.2 95.2-63h0z" fill="#e0e0e0" />
        <path d="M317.6 326.9c0 8.4-9.9 8-18.5 8-8.5 0-14 .5-17.9 3.3s-1.1 22-36.4 54.1c-21 19-40.9 31.7-44.1 30.6s-9.6-17.4-11.1-23.5c-14 4.1-45.7-2.2-40.9-3.3 16.3-3.9 40.6-15 56.8-27.3l39.7-30.1c5.8-3.9 22.6-16.3 30.1-17.1 12.2-1.3 42.3-3.8 42.3 5.3h0z" fill="#ff2b25" />
        <path d="M271.2 280.8c0 13.7-12.7 25.4-28.4 23.7-13.5-1.4-24.6-11.1-24.6-24.8s10.7-26 24.3-26.5c21.9-.6 28.7 13.9 28.7 27.6z" fill="#2f2f2f" />
        <path d="M211.6 384.8c5.2-4.4-5.2-16.6-5.2-16.6l-12.7 8.4c0 .1 10.8 14.3 17.9 8.2zm30.4-22.3c5.2-4.4-5.5-17.6-5.5-17.6L223 355.4c0-.1 11.8 13.1 19 7.1h0zm13.8-7.4c-4.5 5.2 8.3 17.1 8.3 17.1s10.6-14 9.4-14.9c-1.1-.9-11.7-9.3-17.7-2.2zm-22.9 22.8c-4.5 5.2 5.8 18.8 7.6 18.2s11.7-11.1 11.7-11.1-13.3-14.2-19.3-7.1h0z" fill="#fffefd" />
        <path d="M421.3 218.2c-6.6 4.4-2.2 13.8 1.6 21.5 3.9 7.7 6.3 14.8 6.8 25.2.4 9.4-2.1 26.3-3.2 32.2-1 5.3-4.6 17 3.3 19 9.9 2.5 12.7-5.2 14.9-12.7 2.9-9.7 4.3-29.4 3.9-39.4-1.1-21.4-8.3-34.2-11.6-39.1-3.3-5-9.2-11-15.7-6.7h0zm48.3 13.2c-4.4 3.5 0 14 1.9 18.8 1.9 4.7 2.9 11.3 2.9 18 0 4.7-.9 15.6-1.5 21.6-.8 9.1-.4 14.5 6.3 15.7 10.5 1.9 10.9-12.1 11.9-17.9.8-4.6 1.5-19.9.9-27.1-.5-7.2-3.9-17.6-8.1-23.9-3.3-5-8.8-9.6-14.3-5.2h0zm-92.4-17.3c-9.1 4.6.8 20.2 3.3 25.4s6.1 16.8 5.8 29c-.3 12.1-1.2 24.6-3.3 31.3-1.8 5.9-7.2 15.9-3.1 20 6.1 6.1 15.8-.2 19.2-10.1 4.9-14.5 6.2-26.3 5.6-45.1-.7-25.2-14-57.4-27.5-50.5z" fill="#606568" />
        <path d="M208 399.7c-4.5 5.2 5.2 17.4 5.2 17.4l13.5-9.4c.1 0-12.6-15.1-18.7-8h0zm58.5-58.7c5.1-4.6-3.6-14.3-3.6-14.3s-12.4 7.5-11.9 8.3c1.3 1.7 10 11 15.5 6z" fill="#fffefd" />
        <path class="svg" d="M147.5 218c-10.8-28.3-14.1-36.2-44-70.4-40.6-46.4 16-60.2 16-60.2s-.6 4.6 1.8 9.1c0 0 3.2-13.9 17.4-20.8 14.8-7.2 34.1 2.7 43.8 17.7 30.7 47.5-23.4 65.7-23.4 65.7s22.8 31.2 25.3 41.2c2.7 10.6-30.5 34.6-36.9 17.7zm-7.1-83.5l4.7-8.7s5.6 7.9 10.2 4.3c12.1-9.4-7.4-23.2-15.4-11.7-5.6 8.1.5 16.1.5 16.1zm77.9 39.3c-2-5.5-13.4-84.6-14.8-94.3-7.7-52.8 53.3-51.1 53.3-51.1s-2.8 10.2 2.4 20.7c4.8 9.5 47.8 74.7 51.5 90.7 2 8.7-27.5 24.2-34 20.3-9.1-5.5-22.8-46-25.7-43.8-3.3 2.5 11.4 41.2 9.4 48.3-2.2 7.8-38.9 18-42.1 9.2zm10.3-86.7l6.4-7.5s3.8 8.9 9 6.4c13.8-6.6-2.3-24.3-12.6-14.8-7 6.7-2.8 15.9-2.8 15.9zm166.6-42.3s-14.2-8.5-30.7-4.4l-7.6 1.9s18.9 88.5 16.5 95.3c-2.9 8.3-37.1 14.3-41.5 5.3-3.2-6.6-8.4-93.6-8.4-93.6-13.7 2.5-22.3 3.2-29.3 1.6-8.2-1.9-15.5-39.5-1.4-38.1 23.5 2.3 30.9 1.6 64.8-8.3 46.1-13.6 37.6 40.3 37.6 40.3zm7 92.3s13.7-11 13.5-27.7c-.2-13.7 1-66.5.6-73.5-3-47.1 56.8-24.4 56.8-24.4s-13.7 11-13.5 27.7c.2 13.6-1 66.4-.6 73.5 3 47.1-56.8 24.4-56.8 24.4zm89.2 10.9c-14.4 1.2-30.8-9.6-30.8-9.6s20.3-46.3 23.2-58.1S497 16.1 497 16.1s21.9-4 35.4 4.1c17.3 10.3 9.9 44 11.6 57.5 1.8 13.5 5.1 18.8 5.1 18.8s-1.7-41.1 5.6-55.1c4.1-7.8 11.1-14.5 23.9-9.6 12.8 5 18.4 9.6 18.4 9.6s-8.9 10.1-13 27.3c-4 17.2-14.5 69.6-16.9 78.4-3.2 11.8-10.4 21.5-28.9 16.3-21.3-6-23.8-13.8-23.8-13.8s5.7-12.6 7.6-27.1c2.3-17.1-3.5-36.8-3.5-36.8s4.4 59.7-27.1 62.3zm97-31.5c16.8-32.3 43.4-49.2 65.1-47.6 31.1 2.3 58.3 34.9 48.1 52.6-15.1 26.3-44.9 3.3-44.9 3.3s13.7-9.9 6.6-12.8-19.4 3.2-27.7 15.7c-7.9 11.8-19.3 38.9-12.2 42.3 2.6 1.2 5.9 5.2 9.8.2 2.9-3.7 4.8-5.9-1.7-10.3-6.6-4.6 3.7-24 13.4-24.6 4.3-.3 17.4 7.2 23.4 11.3 6.9 4.7 13.3 9.3 5.4 22.8-22.7 38.9-28.5 55.2-76.1 22.9-31-21.1-26-43.5-9.2-75.8zM128 663.7c14.1-33.6 39.1-52.6 60.9-52.8 31.2-.3 61 29.9 52.3 48.4-12.9 27.4-44.5 7.1-44.5 7.1s12.8-11 5.5-13.3c-7.3-2.2-19.1 4.9-26.3 17.9-6.9 12.4-16 40.4-8.6 43.2 2.7 1 6.3 4.7 9.8-.6 2.5-3.9 4.3-6.3-2.6-10.2-7-4 1.7-24.2 11.3-25.7 4.2-.6 17.9 5.7 24.2 9.3 7.3 4.1 14 8.2 7.3 22.2-19.4 40.6-23.8 57.4-73.9 29.1-32.6-18.3-29.5-41-15.4-74.6zm187.6 95.8c-4.1 10.7-3.8 31.2-3.8 31.2s-34.1 1.5-32-15c0 0-9.8 8.7-30.7.1-15.5-6.4-24.4-19.4-14.8-46.2 6.1-17 19.4-26.8 38.8-23.5 12.8 2.1 21.6 9.5 23.5 12 .4-2.2 4.7-13.2-13.1-19.3-14.2-4.8-33.1 4-33.1 4s-6.8-32.8 19.7-31.8c14.3.6 54.1 4.3 59.6 30 1.8 8.4.5 12.9-2.4 23.9-2.1 10.5-7.3 22.9-11.7 34.6zM284 740.9l-9.1 2.9s1.7-9.5-3.8-10.2c-14.7-1.8-11.1 21.8 2.3 19.2 9.2-1.8 10.6-11.9 10.6-11.9zm209.7 42.9s-33.7 20.6-42.5.8c-4.1-9.2.7-57.3-3.8-60.9-4.7-3.9-9.1-1.3-9.2 2.6-.2 3.9 3.9 50.8 1.4 60.7-2.6 10.4-45.5 14.7-39.8-2.3 5-14.6 3.7-57.2.5-59.8-4.7-3.9-9.1-1.3-9.2 2.6-.2 3.9 3.9 50.8 1.4 60.7-2.6 10.4-43.2 15.4-39.8-2.3 4.2-21.5 1.8-35.1-1.9-60.6-6.3-44.6 25.5-36.7 25.5-36.7s-4.3 3-.5 7.1c0 0 7.5-8.5 24.5-9.1 14.4-.5 16.5 4.9 19.7 10.1 4-6.6 8.5-11.8 25-12.2 23.1-.6 39.2 8.8 41 60.4 1.2 36.4 7.7 38.9 7.7 38.9zm58.7-58c3.1 5.1 10.2 8.2 21.2 5.2 9.5-2.5 23.1-17.1 23.1-17.1s22.9 21.3 4.1 38.8c-7.1 6.6-20.5 12.5-39.7 15.4-25 3.9-42.7-19.4-48.1-38.1-5.3-18.7-8.7-56.6 29.4-69.6 39.2-13.3 53.2 21.8 53.2 32.2 0 35.1-43.7 32.4-43.2 33.2zm-2.7-11.9l5.3-5.9s2.9 7.4 7.1 5.5c11.2-5-1.5-20-9.8-12.5-5.9 5.2-2.6 12.9-2.6 12.9zm148.2-58.4c32.5 47.5-38 77.1-59.8 72.7-6.3-1.3-10.2-35-4-36.3 9.3-1.9 33.7-1.3 31.6-6.4-2.5-6.3-30.4 2.7-41.8-.8-13.8-4.3-21.7-23.3-18.6-38.7 3.3-16.8 27.3-30.7 40.5-34.5 48.1-13.7 24.7 29.9 24.7 29.9s-6.8-6.3-18.1-1.8c0 0-11 4.6-7.6 7.5 2.6 2.2 41.6-8.4 53.1 8.4z" />
      </svg>
    </section>
    <h4 class="featured title">Featured</h4>
    <ul id="featured" role="list">
      <?php
      $conn = new mysqli($hostname, $username, $password, $database);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      searchGames($conn, 'category', 'Featured');

      $conn->close();
      ?>
    </ul>
    <h4 class="title">Browse by category</h4>
    <ul id="categories" role="list">
      <li>
        <form class="all" method="post">
          <img src='assets/img/categories/all.svg' alt='Category Icon'>
          <input type="submit" name="all" value="All">
        </form>
      </li>
      <?php
      // For the category buttons
      $buttons = array("Action", "Arcade", "Adventure", "Casual", "Puzzle", "Racing", "Shooter", "Simulation", "Sports", "Strategy");

      foreach ($buttons as $name) {
        echo "<li><form class=" . lcfirst($name) . " action='https://patinggames.000webhostapp.com#categories' method='post'><img src='assets/img/categories/" . lcfirst($name) . ".svg' alt='Category Icon'><input type='submit' name='category' value={$name}></input></form></li>";
      }
      ?>
      <li>
    </ul>
    <ul id="list" role="list">
      <?php
      $conn = new mysqli($hostname, $username, $password, $database);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // For clicking the clear button
      if (isset($_POST['all'])) {
        loadGames($conn);
      }

      // For clicking from the categories
      if (isset($_POST['category'])) {
        searchGames($conn, 'category', $_POST['category']);
      }

      // Searching at the search bar
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['search'])) {
          $query = htmlentities($_GET['search']);
          searchGames($conn, 'search', $query);
        } else loadGames($conn);
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
          // Retrieve values from the form
          $title = $_POST["title"];
          $descp = $_POST["descp"];
          $longDescp = $_POST["long-descp"];
          $tags = $_POST["tags"];
          $link = $_POST["link"];

          // Handle image upload
          $folder = "assets/img/thumbnail/";
          $directory = "C:/xampp/htdocs/PatingGames/$folder";
          $thumbnail = $directory . str_replace(' ', '-', basename(($_FILES["image"]["name"])));

          // Move the upload file to the directory
          move_uploaded_file($_FILES["image"]["tmp_name"], $thumbnail);

          $query = "INSERT INTO game (title, descp, tags, link, thumbnail, long_descp) VALUES (?, ?, ?, ?, ?, ?)";

          $thumbnail = $folder . str_replace(' ', '-', basename(($_FILES["image"]["name"])));
          $stmt = mysqli_prepare($conn, $query);
          mysqli_stmt_bind_param($stmt, "ssssss", $title, $descp, $tags, $link, $thumbnail, $longDescp);

          mysqli_stmt_execute($stmt);
          mysqli_stmt_close($stmt);
          loadGames($conn);
        }
      }

      function loadGames($conn)
      {
        $query = "SELECT title, descp, tags, thumbnail, long_descp FROM game";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_object()) {
            renderGames($row);
          }
        }
      }

      function searchGames($conn, $cate, $tag)
      {
        if ($cate == 'category') {
          $query = "SELECT * FROM game
          WHERE FIND_IN_SET('$tag', tags) > 0";
        } else if ($cate == 'search') {
          $query = "SELECT * FROM game
          WHERE LOWER(title) LIKE LOWER('%$tag%')";
        } else {
          $query = "SELECT * FROM game
          WHERE tags LIKE '%$tag%'";
        }

        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_object()) {
            renderGames($row);
          }
        }
      }

      function renderGames($game)
      {
        echo "<li class='card'>
          <div class='thumbnail'>
              <img src={$game->thumbnail} alt='Game Thumbnail'>
          </div>
          <div class='info'>
            <h4>{$game->title}</h4>
            <p>{$game->descp}</p>
            <form action='gamepage.php' method='get'>
                <button name='game' value='{$game->title}' type='submit'>PLAY</button>
            </form>
          </div>
        </li>";
      }

      $conn->close();
      ?>
      <a class="backtop" href="#"><img src="./assets/img/icons/top.svg" alt="Back to Top"></a>
  </main>
  <?php require 'components/footer.php' ?>
</body>

</html>