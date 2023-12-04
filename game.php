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
  require_once 'components/games.php';

  $GameChoice = htmlentities($_GET['PlayButton']);

  if ($selected = array_filter($games, function ($game) use ($GameChoice) {
    return $game->title === $GameChoice;
  })) {
    $selected = reset($selected);

    echo "
    <main style='display: flex; justify-content: center; align-items: center; height: 100vh;'>
        <div>
            <iframe width='800' height='600' allow='fullscreen; autoplay; encrypted-media' src='{$selected->link}' frameborder='0' allowfullscreen='true' msallowfullscreen='true' mozallowfullscreen='true' webkitallowfullscreen='true' allowpaymentrequest='false' referrerpolicy='unsafe-url' sandbox='allow-same-origin allow-forms allow-scripts allow-pointer-lock allow-orientation-lock allow-popups' scrolling='no'></iframe>
        </div>
    </main>";
    
    
    echo "<br>";
    echo "<br>";

    
    echo "<div style='text-align: center; max-width: 1000px; margin: 0 auto; border: 1px solid #ccc; padding: 10px;'>{$selected->descDetails}</div>";

    echo "<br>";
    echo "<br>";

    echo "<div style='text-align: center; max-width: 200px; margin: 0 auto; border: 1px solid #ccc; padding: 10px;'>{$selected->tagDetails}</div>";

    echo "<br>";
    echo "<br>";



 


   

  } else {
    echo "hello: $GameChoice";
  }

  
  require 'components/footer.php';

  

  
  ?>

</body>

</html>