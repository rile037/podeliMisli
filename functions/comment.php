<?php
include "init.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $post_comment = clean($_POST['post_comment']);
  $post_id = clean($_POST['post_id']);


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
        $sql .= "VALUES($user_id, '$post_id', '$post_comment')";
        confirm(query($sql));
        set_message('Uspesno ste dodali komentar!');
        redirect('../index.php');
        echo $comment;
    }

  }}
