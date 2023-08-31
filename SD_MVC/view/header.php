<!--<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="../..//assets/favicon/favicon.ico">
		<link rel="stylesheet" href="../../styles.css">
		<title>Scribe's Desk</title>
</head>-->
<body>
<header>
	<a href="../../index.php">

		<div class="header-left">

			<h1 class="italic">The Scribe's Desk</h1>
			<img class="logo" src="/project_start/SD_MVC/view/assets/logo/logo.png">

		</div>

	</a>

    <div class="header-right">

		<div class="dropdown">

			<button class="dropbtn button header-button">Themes</button>

				<form class="dropdown-content">

					<label class="theme-label active" for="dark">Dark</label>
					<input type="radio" name="theme" id="dark" >

					<label class="theme-label" for="light">Light</label>
					<input type="radio" name="theme" id="light" >

					<label class="theme-label" for="table-top">Table-top</label>
					<input type="radio" name="theme" id="table-top" >

				</form>
		</div>

		<?php if (isset($_SESSION['account'])) { ?>
			
			<form action="/project_start/SD_MVC/view/account/index.php" method="post">

				<input type="hidden" name="action" value="account">

				<input class="button header-button" type="submit" value="Account">

			</form>

            <!--<a class="button header-button" href="/project_start/SD_MVC/view/account/account.php">Account</a>-->

        <?php } else { ?>

			<a class="button header-button" href="/project_start/SD_MVC/view/account/sign_in.php">Log-in</a>
			
		<?php } ?>
		
	</div>
</header>