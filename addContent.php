<?php
include('inc/header.php');
?>

<?php if (isset($_SESSION['email'])) : ?>
<?php create_post();?>
<br>


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

      <?php include "inc/footer.php" ?>

<?php include "inc/footer.php";?>