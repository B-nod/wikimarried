<?php
session_start();
session_unset();
session_destroy();
setcookie("nestadvelogincheck",md5($_SESSION['sessUsername']),1);
header("Location:login.php");
exit();