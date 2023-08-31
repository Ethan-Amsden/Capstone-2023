<?php 
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="assets/favicon/favicon.ico">
		<link rel="stylesheet" href="styles.css">
		<title>Log In</title>
	</head>
<?php include 'view/header.php'; ?>
<main class="center-form">
        <form id="signInForm" class="sign-in" action="display_signIn.php" method="post">
            <h2>Sign in</h2>
            <input id="email" type="email" name="email" placeholder="Email">
            <span class="error"></span>
            <input id="password" type="password" name="password" placeholder="Password">
            <span class="error"></span>
            <p>Don't have an account? <a href="<?php echo 'sign_up.php' ?>">Sign up!</a></p>
            <button class="button submit-button" type="submit">Login</button>
        </form>
    </main>
    <script src="main.js"></script>
</body>
</html>