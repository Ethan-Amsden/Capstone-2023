
<?php 

    $username = filter_input(INPUT_POST, 'username');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    
?>

<body> 
    <main class="center-form">
        <h1>Account Information</h1>
        <label>Username:</label>
        <span><?php echo $username; ?></span><br>

        <label>Email Address:</label>
        <span><?php echo $email; ?></span><br>

        <label>Password:</label>
        <span><?php echo $password; ?></span><br>
    </main>
</body>
</html>