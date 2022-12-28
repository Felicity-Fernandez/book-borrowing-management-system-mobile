<?php
session_start();
@include 'db_link.php';
@include 'signup.php';
	$sel = "SELECT*FROM bookborrowed WHERE borrowerNo='{$_SESSION["studentNo"]}' AND status=0";
	$res = mysqli_query($conn, $sel);
	if (mysqli_num_rows($res) > 0) {
		$sel = "UPDATE bookborrowed SET status=1 WHERE borrowerNo='{$_SESSION["studentNo"]}' AND status=0";
		$res = mysqli_query($conn, $sel);
		header('location: dashboardpage.php');
	}
	header('location: dashboardpage.php');
?>