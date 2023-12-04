<?php include_once 'components/submit.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | PatingGames</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/contact.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="script.js" defer></script>
</head>

<body>
  <?php require "components/header.php" ?>
  <main>

    <?php if (!empty($statusMsg)) { ?>
      <div class="status-msg <?php echo $status; ?>"><?php echo $statusMsg; ?>
        <span class="closebtn">&times;</span>
      </div>

      <script>
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
          close[i].onclick = function() {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function() {
              div.style.display = "none";
            }, 600);
          }
        }
      </script>
    <?php } ?>

    <form action="" method="post">
      <div class="contact form">
        <div class="card">
          <div class="container">
            <h2 style="text-align: center;">Contact Us</h2>
            <div class="form-input">
              <label for="name">Name:</label>
              <input type="text" name="name" placeholder="Enter your name" value="<?php echo !empty($postData['name']) ? $postData['name'] : ''; ?>" required="">
            </div>
            <div class="form-input">
              <label for="email">Email:</label>
              <input type="email" name="email" placeholder="Enter your email" value="<?php echo !empty($postData['email']) ? $postData['email'] : ''; ?>" required="">
            </div>
            <div class="form-input">
              <label for="subject">Subject:</label>
              <input type="text" name="subject" placeholder="Enter subject" value="<?php echo !empty($postData['subject']) ? $postData['subject'] : ''; ?>" required="">
            </div>
            <div class="form-input">
              <label for="message">Message:</label>
              <textarea name="message" placeholder="Type your message here" required=""><?php echo !empty($postData['message']) ? $postData['message'] : ''; ?></textarea>
            </div>
            <input type="submit" name="submit" class="btn" value="Submit">
          </div>
        </div>
      </div>
    </form>
  </main>
  <?php require "components/footer.php" ?>
</body>

</html>