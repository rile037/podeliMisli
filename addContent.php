<?php
include('inc/header.php');
?>

<?php if (isset($_SESSION['email'])) : ?>
<?php create_post();?>
<br>
<link rel="stylesheet" href="css/style.css" />

<form class="formaPostaviIspovest" method="POST">
  <h3 style="padding: 10px;">Nova ispovest</h3>
  <textarea class="textAreaIspovest" name="post_content" cols="60" rows="10" placeholder="Napisite vasu ispovest..."></textarea>
    <input type="submit" value="Postavi" name="submit" class="buttonPostavi">
  </form>

  <div>
  <?php display_message(); ?>
</div>

<hr>


      <?php else :

        redirect("login.php");?>
      <?php endif; ?>
      <!-- 
    <div class="welcome">
      <a href="login.php">
        <button style="width: 40%" class="buttonLogin">Login</button>
      </a>
      <div class="separator">
        <div class="line"></div>
        <h2>Or</h2>
        <div class="line"></div>
      </div>
      <a href="register.php">
        <button style="width: 40%; margin-top: 0px" class="buttonRegister">
          Register
        </button>
      </a>
    </div>
  </body>
</html>-->
<nav class="mobile-nav" style='margin: 0;'>
      
        <a href="index.php" class="bloc-icon ">
        <i class="fa-solid fa-home" style='color: white;'></i>
        </a>
        <a href="addContent.php" class="bloc-icon active">
        <i class="fa-solid fa-feather-pointed ikonica"></i>
        </a>
        <a href="message.php" class="bloc-icon">
        <i class="fa-solid fa-message ikonica"></i>
        </a>
    </nav>
      <?php include "inc/footer.php" ?>

<?php include "inc/footer.php";?>