<?php
session_start();
//session_unset($_SESSION); //reover Uma variavel
session_destroy();
echo '<meta http-equiv="refresh" content="0;url=../login.php">';
 ?>
