<?php
session_start();
@include 'db_link.php';
@include 'signup.php';
$userdata = check_login($conn);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dstyle.css">
</head>
<body>
	<div class="wrapper">
		<div class="sidebar-header">
			<div class="sidebar">
				<div class="icn"><img src="book.png"></div>
			<center>
			<img src="imagesfold/<?php echo $userdata["pic"]; ?>" width= "100px" height= "100px" alt="">
			<br>
			<h2><?php echo $userdata['fname'], ' ', $userdata['lname'];?> </h2>
			<br>
				<a href="profile.php" class="edit">Edit Profile</a>
		</center>
		<br>
		<ul>
		<li><i class="las la-id-badge"></i><a href="#"><?php echo $userdata['studentNo'];?></a></li>
		<li><i class="las la-id-badge"></i><a href="#"><?php echo $userdata['year'], '-', $userdata['sect'];?> </a></li>
		<li><i class="las la-id-badge"></i><a href="#"><?php echo $userdata['course'];?></a></li>
		<li><i class="las la-id-badge"></i><a href="#"><?php echo $userdata['dept'];?></a></li>
		<li><i class="las la-sign-out-alt"></i><a href="logout.php">Logout</a></li>
		</ul>
		<span class="backicn"><i class="las la-angle-left"></i></span>		
			</div>
			<div class="backdrop"></div>
			<div class="content">
				<header>
					<div id="mobile" class="profilebtn">
						<i class="las la-user-circle"></i>
					</div>
					<div id="desktop" class="profilebtn">
						<i class="las la-user-circle"></i>
					</div>
					<h1>Book Borrowing System</h1>
					<div class="notif" onclick="toggleNotif()">
						<i class="las la-bell"></i>
					</div>
					<div class="notifbox" id="box">
						<h2>Notification</h2>
						<div class="notifitem">
							<div class="text">
								<h4>No notifications yet.</h4>
							</div>
						</div>
					</div>
				</header>
				<div class="data">
					<h2>Dashboard</h2>
					<div class="listtable">
					<div class="list">
						<h1>Currently Borrowed Books</h1>
						<table class="tab">
							<thead>
								<tr>
									<th>Book Title</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Request Renewal</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sel = "SELECT*FROM bookborrowed WHERE borrowerNo='{$_SESSION["studentNo"]}'";
								$res = mysqli_query($conn, $sel);
								while ($row = $res->fetch_assoc()) {
									echo "<tr>
									<td>" . $row['bookTitle'] . "</td>
									<td>" . $row['dateBorrowed'] . "</td>
									<td>" . $row['dueDate'] . "</td>
									<td>
										<a href='#' class='ren'>Renew</a>
									</td>
								</tr>";
								}
								
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="listtable">
					<div class="list">
						<h1>Violations</h1>
						<table class="tab">
							<thead>
								<tr>
									<th>Violation</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sel = "SELECT*FROM violationtbl WHERE violatorNo='{$_SESSION["studentNo"]}'";
								$res = mysqli_query($conn, $sel);
								while ($row = $res->fetch_assoc()) {
									echo "<tr>
									<td>" . $row['violationName'] . "</td>
								</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<script src="index.js"></script>
</body>
</html>