<?php

function redirect($location){
  header("location: {$location}");
  exit();
}

function clean($string){
  return htmlentities($string);
}

function email_exists($email){
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = query($query);

    if($result->num_rows > 0){
      return true;
    }else{
      return false;
    }
}


function user_exists($username){
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $query = "SELECT id FROM users WHERE username = '$username'";
  $result = query($query);

  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  }
}

function set_message($message){
  if(!empty($message)){
    $_SESSION['message'] = $message;
  } else{
    $message = "";
  }
}

function display_message(){
  if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}


function validate_user_registration(){
    $errors = [];

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $email = clean($_POST['email']);
      $username = clean($_POST['username']);
      $password = clean($_POST['password']);
      $confirm_password = clean($_POST['confirm_password']);

      if(strlen($email) < 3){
        $errors[] = "- Email ne sme biti manji od 3 karaktera";
      }
      if(strlen($username) < 3){
        $errors[] = "- Username ne sme biti manji od 3 karaktera";
      }
      if(strlen($username) > 20){
        $errors[] = "- Username ne sme biti veci od 20 karaktera";
      }
      if(email_exists($email)){
        $errors[] = "- Taj email je zauzet!";
      }
      if(user_exists($username)){
        $errors[] = "- Taj username je zauzet!";
      }
      if(strlen($password) < 8){
        $errors[] = "- Lozinka mora biti veca od 8 karaktera!";
      }
      if($password != $confirm_password){
        $errors[] = "- Lozinke se ne podudaraju!";
      }
      if(!empty($errors)){
        foreach($errors as $error){
          echo "<div class='
          alert' style='
          color: red;
          text-align: center;
          font-size: 20px;
          '>" . $error . "</div>";
        }
      } else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        create_user($email, $username, $password);
      }

    }
}

function validate_user_login()
{
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);

        if (empty($email)) {
            $errors[] = "Polje za email ne sme biti prazan.";
        }
        if (empty($password)) {
            $errors[] = "Polje za lozinku ne sme biti prazno.";
        }
        if (empty($errors)) {
            if (user_login($email, $password)) {
                redirect('index.php');
            } else {
                $errors[] = "- Pogresni podaci za prijavljivanje, pokusajte ponovo.";
            }
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div class="alert" style="
                color: red;
                text-align: center;
                "> ' . $error . '</div>';
            }
        }
    }

}

function user_login($email, $password)
{
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = query($query);

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        if (password_verify($password, $data['password'])) {
            $_SESSION['email'] = $email;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function create_user($email, $username, $password){

    $email = escape($email);
    $username = escape($username);
    $password = escape($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(email,username,password,profile_image)";
    $sql .= "VALUES('$email','$username','$password','uploads/default.jpg')";

    confirm(query($sql));
    set_message("Uspesno ste se registrovali!");
    redirect('login.php');
}


function get_user($id = NULL){
    if($id != NULL){
        $query = "SELECT * FROM users WHERE id =" . $id;
        $result = query($query);

        if($result->num_rows > 0){
          return $result->fetch_assoc();
        }else{
          return "User not found!";
        }

    }else
      {
      $query = "SELECT * FROM users WHERE email ='" . $_SESSION['email'] . "'";
      $result = query($query);
      }
    if($result->num_rows > 0)
    {
      return $result->fetch_assoc();
    }else{
      return "User not found!";
    }
}


function get_post($id = NULL){
  if($id != NULL){
      $query = "SELECT * FROM posts WHERE id =" . $id;
      $result = query($query);

      if($result->num_rows > 0){
        return $result->fetch_assoc();
      }else{
        return "Post not found!";
      }
}}


function user_profile_image_upload()
{
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $target_dir = "uploads/";
    $user = get_user();
    $user_id = $user['id'];
    $target_file = $target_dir . $user_id . "." .pathinfo(basename($_FILES["profile_image_file"]["name"]), PATHINFO_EXTENSION);;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $error ="";

    $check = getimagesize($_FILES["profile_image_file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $error = "Izabrana datoteka nije fotografija.";
        $uploadOk = 0;
    }

    if ($_FILES["profile_image_file"]["size"] > 5000000) {
        $error = "Fotografija prelazi maksimalnu dozvoljenu velicinu.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error = "Dozvoljeni fajlovi su jpg, png, jpeg, gif.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        set_message('Greska prilikom biranja slike: '. $error);
    } else {
        $sql = "UPDATE users SET profile_image='$target_file' WHERE id=$user_id";
        confirm(query($sql));
        set_message('Profilna slika je uspesno promenjena!');

        if (!move_uploaded_file($_FILES["profile_image_file"]["tmp_name"], $target_file)) {
            set_message('Greska prilikom biranja slike: '. $error);
        }
    }

    redirect('profile.php');

  }
}

function user_restrictions(){
  if(!isset($_SESSION['email'])){
    redirect('login.php');
  }
}


function login_check_pages(){
  if(isset($_SESSION['email'])){
    redirect('index.php');
  }
}


function create_post(){
  $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $post_content = clean($_POST['post_content']);

        if (strlen($post_content) > 200) {
            $errors[] = "Ispovest je predugacka [MAX: 200 karaktera]!";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div class="alert">' . $error . '</div>';
                echo("Error description: " . $mysqli -> error);
            }
        } else {
            $post_content = filter_var($post_content, FILTER_SANITIZE_STRING);
            $post_content = escape($post_content);
            $user = get_user();
            $user_id = $user['id'];

            $sql = "INSERT INTO posts(user_id, content, approve, judge) ";
            $sql .= "VALUES($user_id, '$post_content', 0, 0)";
            confirm(query($sql));
            set_message('Uspesno ste dodali ispovest!');
            redirect('index.php');
        }
    }
}


function create_comment(){
  $errors = [];
  
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $post_comment = clean($_POST['post_comment']);

        if (strlen($post_comment) > 150) {
            $errors[] = "Komentar je predugacak [MAX: 150 karaktera]!";
        }

        if (strlen($post_comment) < 1) {
          $errors[] = "Komentar je prekratak [MIN: 15 reci]!";
      }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<body><div class="alert">' . $error . '</div></body>';
                echo("Error description: " . $mysqli -> error);
            }
        } else {
            $post_comment = filter_var($post_comment, FILTER_SANITIZE_STRING);
            $post_comment = escape($post_comment);


            $query = "SELECT * FROM posts";
            $result = query($query);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $post = $row['id'];

              }
            $user = get_user();
            $user_id = $user['id'];

            $sql = "INSERT INTO comments(user_id, post_id, content) ";
            $sql .= "VALUES($user_id, '$post', '$post_comment')";
            confirm(query($sql));
            set_message('Uspesno ste dodali komentar!');
            redirect('index.php');
        }
    }
  }
}

function fetch_all_posts()
{


    $query = "SELECT * FROM posts ORDER BY created_time DESC";
    $result = query($query);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user = get_user($row['user_id']);
            $post = $row['id'];

            $date = date("d-m-Y", strtotime($row['created_time']));
            $time = date("H:i", strtotime($row['created_time']));

            echo "<div class='post'>
            <div>
            <p style='color: gray; padding-bottom: 12px; display: flex; float: left; font-size: 15px;'>#" . $post . "</p>
            <p style='color: gray; padding-bottom: 12px; display: flex; float: right; font-size: 15px'>" . $date . " - ". $time ."</p>
            </div>
            <div style='margin-top: 50px;'>
            <p><img src='" . $user['profile_image'] . "' alt='' style='max-width: 250px;'><i><b>" . $user['username'] . "</b></i></p>
            
                    <p style='max-width: 500px; padding: 15px;'><strong><q>" . $row['content'] . "</q></strong></p>
                 
                    <div style='text-align: center; display: flex;'>
                    <div class='approves'><p id='approve_".$row['id']."'>Odobravanja: " . $row['approve'] . "

                    
                    </p>";
                    if(isset($_COOKIE['approved_' . $post])){

                    echo"  
                    <button style='background-color: green; color: white;' disabled='disabled' onclick='approve_post(this)' id='approvePost' data-post_id='".$row['id']."'>Odobri</button>";
                    }
                    else{
                      echo"  
                      <button style='background-color: white;' onclick='approve_post(this)' id='approvePost_".$row['id']."' data-post_id='".$row['id']."'>Odobri</button>";
                    }
                    
                    echo "</div>

                    <div  class='judges'><p id='judge_".$row['id']."'>Osude: " . $row['judge'] . "

                    </p>";

                    if(isset($_COOKIE['judged_' . $post])){

                    echo"

                    <button style='background-color: red; color: white;' disabled='disabled' onclick='judge_post(this)' id='judgePost_".$row['id']."' data-post_id='".$row['id']."'>Osudi</button>";
                    }
                    else{
                    echo "
                    <button style='background-color: white;' onclick='judge_post(this)' id='judgePost' data-post_id='".$row['id']."'>Osudi</button>";
                  }
                    echo"
                    
                    </div>
                    </div>
                    </div>
                    
                    ";
                   /*  $query2 = "SELECT * FROM comments WHERE post_id = '$post'";
                    $result2 = query($query2);
                    if ($result2->num_rows > 0) {
                      while ($row2 = $result2->fetch_assoc()) {
                    echo "
                    <div class='comment'>
                    <p> " . $row2['post_id'] . "</p>
                    <p> " . $row2['content'] . "</p>
                    </div>"; 
                      }
                    } 
                    
                    <form action='functions/comment.php' class='formaPostaviKomentar' method='POST' style='max-width: 250;'>
                      <textarea class='textAreaIspovest' style='width: 70%;' name='post_comment' cols='40' rows='3' placeholder='Napisite vase misljenje...'></textarea>
                        <input type='submit' value='Postavi' id='comment_post' style='width: 70%;' name='post_id' class='buttonPostavi'>
                      </form>*/
                echo"
                <hr>
                    <div style=' text-align: center; '>
                    <p style='color: gray; '>Ispovest nema komentara.</p>                      
                    </div>";
                      
          
echo"
                    </div>

                    <hr>
                    ";
        }
      }
    }
      
  
  
