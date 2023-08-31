<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name= "viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
	<link rel="stylesheet" href="../../styles.css">
	<title>Sign Up</title>
</head>

<?php include '../../view/header.php';?>
<body>

    <main class="center-form"> 

        <form id="signUpForm" class="sign-in" action="../account/index.php" method="post">

            <h2>Sign up</h2>
            
            <input type="hidden" name="action" value="sign_up">
            
            <input id="username" type="text" name="nickname" placeholder="Enter a Nickname">
            <span class="error"></span>

            <input id="email" type="email" name="email" placeholder="Enter an email">
            <span class="error"></span>

            <input id="password" type="password" name="password" placeholder="Enter a password">
            <span class="error"></span>

            <input id="confirm-password" type="password" name="confirm" placeholder="Confirm password">
            <span class="error"></span>

            <p>Already have an account? <a href="sign_in.php">Log in!</a></p>

            <input class="button submit-button" type="submit"  value="Sign Up"> 

            <?php if(isset($error)) {?>
                <span class="error"><?php echo $error;?></span>
            <?php }?>

        </form>

    </main>
    <script src="../../main.js"></script>
</body>
</html>