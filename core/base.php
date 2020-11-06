<?php

function conn(){
    return mysqli_connect("localhost", "root", "", "contacts");
}

$role = ["Admin", "Editor", "User"];

$gendersArr = ["male", "female", "other"];
$skillsArr = ["HTML", "CSS", "JS", "PHP", "SQL", "Python", "Node.js", "Kotline"];

date_default_timezone_set("Asia/Yangon");
