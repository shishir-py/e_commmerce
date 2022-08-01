<?php
session_start();
if(isset($_SESSION['auth_user']))
{
    
    unset($_SESSION['auth_user']);
    $_SESSION['message']="Logged Out Successfully";
}
header('Location: index.php')

?>