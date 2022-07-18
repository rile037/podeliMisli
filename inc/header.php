<?php
include "functions/init.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    
    
<link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />

  </head>
  <body>
    <div class="container">
      <nav class="navbar">
        <div class="brand-title">
          <ul>
            <li>
              <a href='index.php' class='naslov'>
            <h3 style='font-family: din-round, sans-serif; color: #1899d6; padding-top: 10px;'>podeliMisli.com</h3>
</a>
</li>
          </ul>
        </div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
          <li><a href="index.php"><i class="fa-solid fa-home"> </i> Početna</a></li>
          <?php if(!isset($_SESSION['email'])) : ?>
            <li><a href="register.php"><i class="fa-solid fa-id-card"></i> Registracija</a></li>
            <li><a href="login.php"><i class="fa-solid fa-key"></i> Prijava</a></li>
            <?php else: ?>
              <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"> </i> Odjava</a></li>
            <li><a href="profile.php"><i class="fa-solid fa-user"> </i> Profil</a></li>
            <?php endif;?>
          </ul>
            </div>
            </nav>
   
            <br>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src='../js/script.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/
js/bootstrap.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
