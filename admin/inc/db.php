<?php
$db = mysqli_connect("localhost", "root", " ", "news_project");
if($db){
    //echo "connected successfully";
}
else{
    die("mysqli connection failed" . mysqli_error($db));
}
?>