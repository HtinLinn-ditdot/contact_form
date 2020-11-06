<?php

if($_SESSION["user"]["role"] > 1){
    linkTo("dashboard.php");
}