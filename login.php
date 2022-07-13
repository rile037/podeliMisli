<?php include ('inc/header.php');
login_check_pages();
?>


<div>
<?php
display_message();
validate_user_login();

?>
<div>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Nikola Rilak" />
    <meta name="description" content="login forma" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <title>Login form</title>
    <link rel="stylesheet" href="css/style.css" />

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
  </head>
  <body>
    <div class="form">
      <form id="forma" method="POST">
        <h1 style="text-align: center; ">
          Anonimne ispovesti -
          <a href="index.php" style="text-decoration: none; color: black"
            >podeliMisli.com</a
          >
        </h1>
        <h2>Prijava</h2>

        <p class="cred" id="email">E-mail</p>
        <input
          type="text"
          name="email"
          class="input"
          placeholder="Unesite E-mail adresu..."
          required
        />
        <p class="cred" id="pass">Lozinka</p>
        <input
        name="password"
          type="password"
          style="margin-left: -16px"
          class="input"
          placeholder="Unesite lozinku..."
          id="id_password2"
          required
        />
        <i
          class="far fa-eye togglePassword"
          style="display: inline"
          id="togglePassword1"
        ></i>
        <a href="www.google.com" target="_blank" id="forgotPass"
          >Zaboravljena lozinka?
        </a>
        <input class="buttonLogin" value="Prijavi se" type="submit" name="login_submit">
      </form>
      <div class="separator">
        <div class="line"></div>
        <h2>Ili</h2>
        <div class="line"></div>
      </div>
      <p>Nemate nalog?</p>
      <a href="register.php">
        <button
          type="submit"
          style="margin-top: 10px; width: 50%"
          class="buttonRegister"
        >
          Registruj se
        </button>
      </a>
      <!--<div class="contact" style="margin-bottom: 50px">
        <button id="google" class="iconContact">
          <i class="fa fa-google fa-2x"></i>
        </button>
        <button id="facebook" class="iconContact">
          <i class="fa fa-facebook fa-2x"></i>
        </button>
        <button id="github" class="iconContact">
          <i class="fa fa-git fa-2x"></i>
        </button>
        <button id="instagram" class="iconContact">
          <i class="fa fa-instagram fa-2x"></i>
        </button>
      </div>
      <-->
    </div>
  </body>
</html>

<?php include "inc/footer.php"?>
