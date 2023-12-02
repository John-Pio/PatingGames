<header>
  <nav>
    <div class="left">
      <a href="index.php"><img width="50px" height="50px" src="./assets/img/SharkLogo.svg" alt="Website Logo"></a>
      <img id="menubr" src="./assets/img/icons/menu.svg" alt="Menu Icon">
      <?php
      if (basename($_SERVER['PHP_SELF']) === 'home.php')
        echo "<form method='get'>
          <span class='search-icon'>&#128269;</span>
          <input type='text' name='search' id='search' placeholder='Search a game!'>"; ?>
      </form>
    </div>
    <div class="right">
      <ul id="navlnk" role="list">
        <li>
          <a href="home.php">Home</a>
        </li>
        <li>
          <a href="contact.php">Contact Us</a>
        </li>
        <li>
          <a href="about.php">About Us</a>
        </li>
        <li><img id="toggle" src="./assets/img/icons/dark.svg" alt="Theme Icon"></li>
      </ul>
    </div>
  </nav>
</header>