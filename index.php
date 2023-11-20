<!DOCTYPE html>

<head>
    <meta name="Viewport" content="width=device-width, initial-scale=1">
    <title>Home | PatingGames</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
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
                        </div>
                    <?php //ayroun make it look good ?>
                    <form action='game.php' method='get'>
                        <button name="PlayButton" value="YouHaveChosen2048" type="submit">PLAY</button>
                    </form>
            </li>
            <li class="card">

                    <div class="thumbnail">
                        <img src="https://placehold.co/200" alt="Game Thumbnail">
                    </div>
                    <div class="info">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                <form action='game.php' method='get'>
                    <button name="PlayButton" value="YouHaveChosenTetris" type="submit">PLAY</button>
                </form>

            </li>
            <li class="card">
                <a href="game.php">
                    <div class="thumbnail">
                        <img src="https://placehold.co/200" alt="Game Thumbnail">
                    </div>
                    <div class="info">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </a>
            </li>
            <li class="card">
                <a href="game.php">
                    <div class="thumbnail">
                        <img src="https://placehold.co/200" alt="Game Thumbnail">
                    </div>
                    <div class="info">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </a>
            </li>
            <li class="card">
                <a href="game.php">
                    <div class="thumbnail">
                        <img src="https://placehold.co/200" alt="Game Thumbnail">
                    </div>
                    <div class="info">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </a>
            </li>
            <li class="card">
                <a href="game.php">
                    <div class="thumbnail">
                        <img src="https://placehold.co/200" alt="Game Thumbnail">
                    </div>
                    <div class="info">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </a>
            </li>
            <li class="card">
                <a href="game.php">
                    <div class="thumbnail">
                        <img src="https://placehold.co/200" alt="Game Thumbnail">
                    </div>
                    <div class="info">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </a>
            </li>
            <li class="card">
                <a href="game.php">
                    <div class="thumbnail">
                        <img src="https://placehold.co/200" alt="Game Thumbnail">
                    </div>
                    <div class="info">
                        <h4>Lorem, ipsum.</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </a>
            </li>

    </main>
    <?php require 'components/footer.php' ?>
</body>

</html>