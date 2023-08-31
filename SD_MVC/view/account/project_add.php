<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="assets/favicon/favicon.ico">
		<link rel="stylesheet" href="../../styles.css">
		<title>Account</title>
	</head>

<?php //include '../../view/header.php'; ?>
<main>
    <h1>Add Project</h1>
    <form action="index.php" method="post" id="add_project_form">
	
        <input type="hidden" name="action" value="add_project">

        <input type="hidden" name="account_Id" value="<?php echo $account_id; ?>">

        <label>Project Title:</label>
        <input type="text" name="project_title" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Project" />
        <br>
        
    </form>

    <form action="index.php" method="post" id="cancel_project_addition_form">

        <input type="hidden" name="action" value="account">

        <input type="submit" value="Cancel" />

    </form>

</main>
<?php //include '../../view/footer.php'; ?>