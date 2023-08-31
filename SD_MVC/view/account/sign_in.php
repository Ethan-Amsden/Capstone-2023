<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name= "viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
	<link rel="stylesheet" href="../../styles.css">
	<title>Sign In</title>
</head>

<?php include '../../view/header.php'; ?>

<main class="center-form">

        <form id="signInForm" class="sign-in" action="../account/index.php" method="post">

            <h2>Sign in</h2>

            <input type="hidden" name="action" value="sign_in">

            <input id="email" type="email" name="email" placeholder="Email" value="">
            <span class="error"></span>

            <input id="password" type="password" name="password" placeholder="Password" value="">
            <span class="error"></span>

            <p>Don't have an account? <a href="sign_up.php">Sign up!</a></p>

            <input class="button submit-button" type="submit" value="login">

            <?php if(isset($error)) {?>
                <span class="error"><?php echo $error;?></span>
            <?php }?>

        </form>

    </main>

    <script src="../../main.js"></script>

</body>
</html>