<header>
  <nav>
    <div class="left">
      <a href="index.php"><img width="50px" height="50px" src="./assets/img/SharkLogo.svg" alt="Website Logo"></a>
      <img id="menubr" src="./assets/img/menu.svg" alt="Menu Icon">
      <form method="get">
        <input type="text" name="search" id="search" placeholder="Search a game!">
      </form>
    </div>
    <div class="right">
      <ul id="navlnk" role="list">
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="contact.php">Contact Us</a>
        </li>
        <li>
          <a href="about.php">About Us</a>
        </li>
        <li><img id="toggle" src="./assets/img/dark-mode.svg" alt="Theme Icon"></li>
      </ul>
    </div>
  </nav>
</header>

<script>
  const menu = document.getElementById('menubr')
  const links = document.getElementById('navlnk')

  menu.addEventListener('click', () => links.classList.toggle('active'))
</script>