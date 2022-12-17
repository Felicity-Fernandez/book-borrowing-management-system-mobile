<?php
include "db_link.php";

function check_login($conn){
	if (isset($_SESSION['studentNo'])) {
		$id = $_SESSION['studentNo'];
		$sel = "SELECT*FROM userstbl WHERE studentNo = '$id' limit 1";

		$res = mysqli_query($conn, $sel);
		if ($res && mysqli_num_rows($res) > 0) {
			$userdata = mysqli_fetch_assoc($res);
			return $userdata;
		}
	}header("location: mobilelogin.php");
	die;
}
?>