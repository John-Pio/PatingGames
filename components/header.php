<header>
  <nav>
    <div>
      <a><img src="https://placehold.co/50" alt="Website Logo"></a>
      <img id="menubr" src="./assets/img/menu.svg" alt="Menu Icon">
    </div>
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
    </ul>
  </nav>
</header>

<script>
  const menu = document.getElementById('menubr')
  const links = document.getElementById('navlnk')

  menu.addEventListener('click', () => links.classList.toggle('active'))
</script>