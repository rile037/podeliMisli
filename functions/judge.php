<?php
include "init.php";

$post_id = clean($_GET['post_id']);

$query = "SELECT judge FROM posts WHERE id=$post_id";
$result = query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $judge = $row['judge'];
    $judge += 1;
}

$sql = "UPDATE posts SET judge=$judge WHERE id=$post_id";

confirm(query($sql));

echo $judge;