<?php
include('inc/header.php');
?>
<div>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Nikola Rilak" />
    <meta name="description" content="login forma" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <title>Index form</title>
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
    <hr>
    <div style='text-align: center; padding-top: 15px;'>
    <select name="filter" id="filter">
  <option value="new">Najnovije</option>
  <option value="approved">Najviše odobrene</option>
  <option value="judged">Najviše osuđene</option>
</select>
    <hr>
    <h3 style='padding-top: 15px;' id='filterName'>Najnovije ispovesti</h3>
    
<h3></h3>
</div>
    <div class="posts">
    <?php display_message(); ?>

        <?php fetch_all_posts(); ?>

        <?php create_comment();?>
    </div>
<?php include('inc/footer.php'); ?>