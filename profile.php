<?php 
include('inc/header.php'); 
user_restrictions();
$user = get_user();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap"
      rel="stylesheet"
    />
    <title>Vas profil</title>
  </head>
  <body>

<div>
  <?php display_message();?>
</div>

  <div>
    <h3 style="padding: 10px">Vasi podaci: </h3>
    <ul>
      <li class="userProfile">- Korisnicko ime: <strong><?php echo $user['username']  ?></strong></li>
      <li clsss="userProfile">- Email adresa: <strong><?php echo $user['email']?></strong></li>
      <li class="userProfile">- Profilna fotografija:<br> <img 
      class='profile-image' 
      id="profileImage"
      style='width: 150px; height: 150px; padding: 5px;' 
      src='<?php echo $user['profile_image']?>'/></li>
      <?php user_profile_image_upload();
?>
    </ul>
  </div>
  <div style="padding-left: 40px;">
  <form method="POST" enctype="multipart/form-data">
    <p style="color: red;">* Izmeni profilnu fotografiju:</p>
    <input type="file" name="profile_image_file" id="profile_image_file" />
    <br>

    <input 
    type="submit" 
    class="buttonLogin"
    value="Sačuvaj izmene"
    id="profileUpdate" 
    name="submit" />
  </form>
</div>
</body>
<script>

button = document.getElementById('profileUpdate');
input = document.getElementById('profile_image_file');
button.style.visibility = 'hidden';
input.onchange = function () {
  button.style.visibility = 'visible';
  };

</script>

  <?php include "inc/footer.php" ?>
</html>
