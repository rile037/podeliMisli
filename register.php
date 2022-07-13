<?php 
include 'inc/header.php';
login_check_pages();
?>
<div>
<?php

validate_user_registration();
display_message();
?>

<div>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Nikola Rilak" />
    <meta name="description" content="register forma" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <title>Register form</title>
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
      <form method="POST" id="forma">
        <h1 style="text-align: center">
        Anonimne ispovesti -
          <a href="index.php" style="text-decoration: none; color: black"
            >podeliMisli.com</a
          >
        </h1>

        <h2>Registracija</h2>

        <p class="cred" id="email">E-mail</p>
        <input
          type="email"
          class="input"
          name="email"
          placeholder="Unesite E-mail adresu..."
          required
        >



        <p class="cred" id="username">korisnicko ime</p>
        <input 
        type="text" 
        name="username" 
        class="input" 
        placeholder="Unesite korisnicko ime..." 
        required
        >



        <p class="cred" id="password">Lozinka</p>
        <input
          type="password"
          style="margin-left: -15px"
          class="input"
          name="password"
          placeholder="Unesite lozinku..."
          id="id_password"
          required
        >
        <i
          class="far fa-eye togglePassword"
          style="display: inline"
          id="togglePassword"
        ></i>



        <p class="cred" id="re-enterPass">Potvrda lozinke</p>

        <input
          type="password"
          style="margin-left: -15px"
          class="input"
          placeholder="Potvrdite lozinku..."
          name="confirm_password"
          id="id_password1"
          required
        >
        <i
          class="far fa-eye togglePassword"
          style="display: inline"
          id="togglePassword1"
        ></i>

        <input class="buttonRegister" value="Registruj se" type="submit" name="register_submit">
      </form>
      <div class="separator">
        <div class="line"></div>
        <h2>Ili</h2>
        <div class="line"></div>
      </div>
      <p>Imate nalog?</p>
      <a href="login.php">
        <button
          type="submit"
          style="margin-top: 10px; width: 50%"
          class="buttonLogin"
        >
          Prijavi se
        </button>
      </a>
    </div>
  </body>
</html>

<?php 
include "inc/footer.php"?>