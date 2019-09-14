<?php

include '../connect.inc';
$id = $_GET['id'];
$getStats = "select review_status from review where id = $id";
$res = mysqli_fetch_array(mysqli_query($link, $getStats));
if ($res[0] == 0) {
    $newstatus = 1;
} else if ($res[0] == 1) {
    $newstatus = 0;
}
$query = "update review set review_status = $newstatus where id = $id";
if (mysqli_query($link, $query)) {
    echo $newstatus?"Shown" : "Hidden";
}   
