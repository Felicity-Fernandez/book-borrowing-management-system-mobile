<?php
session_start();

if (isset($_SESSION['studentNo'])) {
	unset($_SESSION['studentNo']);
}
header('location: mobilelogin.php');
?>