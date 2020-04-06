<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login_registration.php');
}
?>