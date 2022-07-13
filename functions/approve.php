<?php
include "init.php";

$post_id = clean($_GET['post_id']);

$query = "SELECT approve FROM posts WHERE id=$post_id";
$result = query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $approve = $row['approve'];
    $approve += 1;
}

$sql = "UPDATE posts SET approve=$approve WHERE id=$post_id";

confirm(query($sql));

echo $approve;