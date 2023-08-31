<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
		<link rel="stylesheet" href="../../styles.css">
		<title>Account</title>
	</head>

<?php include '../../view/header.php'; ?>

    <main id="account">

        <div class="account-container">

            <h1>Profile</h1>

            <div class="account-info">

                <div class="account-info-details">
                    <h2>Name:</h2>
                    <p><?php echo $_SESSION['account']['Acct_Nickname']; ?></p> <!--$account['Acct_Nickname']-->
                </div>

                <div class="account-info-details">
                    <h2>Email:</h2>
                    <p><?php echo $_SESSION['account']['Acct_Email']; ?></p> <!--$account['Acct_Email']-->
                </div>

                <form action="index.php" method="post">
                                
                    <input type="hidden" name="action" value="sign_out">

                    <input class="button submit-button" type="submit" value="Log out">
                                
                </form>

            </div>

            <div class="projects">

                <h2>Projects</h2>

                <!--<p><a href="?action=show_add_form">Add Project</a></p>-->

                <?php if($showForm == true) {include('project_add.php');} else { ?>

                <form action="." method="post" id="add-project">
                                
                    <input type="hidden" name="action" value="show_add_form">

                    <input type="hidden" name="show_add_form" value="true">

                    <input type="hidden" name="account_Id" value="<?php echo $_SESSION['account']['Acct_Id']; ?>">

                    <input class="button submit-button" type="submit" value="Add Project">
                                
                </form>
                <?php } ?>
                


                <table>

                    <?php foreach ($projects as $project) : ?>
                    
                    <tr>
                        <td><?php echo $project['Project_Title']; ?></td>

                        <td>
                            
                            <form class="project-actions" action="." method="post">

                                <input type="hidden" name="action" value="select_project">

                                <input type="hidden" name="project_Id" value="<?php echo $project['Project_Id']; ?>">

                                <input class="Open" type="submit" value="Open">

                            </form>
                            
                        <!-- </td>

                        <td> -->

                            <form class="project-actions" action="." method="post">
                                
                                <input type="hidden" name="action" value="delete_project">

                                <input type="hidden" name="project_Id" value="<?php echo $project['Project_Id']; ?>">
                                <input type="hidden" name="account_Id" value="<?php echo $_SESSION['account']['Acct_Id']; ?>">

                                <input class="delete" type="submit" value="X">
                                
                            </form>

                        </td>
                    </tr>

                    <?php endforeach; ?>

                </table>

        </div>

    </main>
    <?php include '../../view/footer.php'; ?>
    <script src="../../main.js"></script>
</body>
</html>