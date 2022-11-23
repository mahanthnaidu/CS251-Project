<?php 

session_start();

session_unset();

session_destroy();

header("Location:  Site1/index.php");