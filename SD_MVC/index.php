<?php
include 'sessions.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="view/assets/favicon/favicon.ico">
		<link rel="stylesheet" href="styles.css">
		<title>Home</title>
	</head>

<?php include 'view/header.php'; ?>

		<article>
			<div class="center-form">
				<img class="bigLogo" src="view/assets/logo/Big_Logo.png">
			</div>
			
				<h1 class="welcomeHeader">Welcome to The Scribe's Desk!</h1>
			
			<div class="about">
				
				<p>This is a place for you to write your thoughts, journals,
				essays, or stories without the pressure and complexity of Microsoft Word or Google Documents.
				Listen to music, relax, and let the words flow on the page!</p>

				<p>This editor is designed to be simple to use,
				while also being able to get everything you need done.
				You'll find a wide range of tools to use here in our editor. 
				The tools include: italic and bold for font variations.
				Underline and strikethrough for dynamic text decorations. 
				We also have font size, font style, and align buttons for you to use as well.</p>

				<p>We want to ensure that you get everything that you need to done for whatever type of writing you're working on!
				The design is meant to be simple, elegant, and easy on the eyes-not harsh. There are three designs you can choose from
				in the "Themes" button, the default theme, the dark theme, and our exclusive table-top design.</p>

				<p>If you enjoy writing in our editor, be sure to sign up to save your stories to the platform!</p>
				 
				<p>Have doubts that this platform isn't revolutionary? Take our customer's word for it!</p>

			</div>
			<h1 class="reviews">REVIEWS</h1>
			<div class="reviewPanel">
                    <div class="review"><img id="review1" src="view/assets/images/reviewers/Review1.png" alt="Review by a college student">
						<p> This site helped me with focusing on writing my college essays without feeling overwhelmed.</p>
						<p class="name"><strong>-Jessica Parish</strong></p>
					</div>
                    <div class="review"><img id="review2" src="view/assets/images/reviewers/Review2.png" alt="Review by a traveling journalist">
						<p> I use this site everyday to journal about my travels, whether I'm backpacking or sitting in Rome, being able to pull up this site on my phone and journal is amazing. It's so easy to use!</p>
						<p class="name"><strong>-Jacob Latimer</strong></p>
					</div>
                    <div class="review"><img id="review3" src="view/assets/images/reviewers/Review3.png" alt="Review by an aspiring novelist">
						<p> I'm an aspiring writer attempting to write my first novel. I kept getting distracted on Word, and then I found this site and my productivity shot through the roof!</p>
						<p class="name"><strong>-Martin Stein</strong></p>
					</div>
			</div>
			
			<div class="center-form">
				
				<?php if (isset($_SESSION['account'])) { ?>

				<form action="/project_start/SD_MVC/view/account/index.php" method="post">

					<input type="hidden" name="action" value="account">

					<input class="button cta-button" type="submit" value="Account">

				</form>

				<?php } else { ?>

				<a class="button cta-button" href="view/account/sign_up.php">Let's Write!</a>

				<?php } ?>

			</div>

		</article>
		<?php include 'View/footer.php'; ?>
		<script src="main.js"></script>
	</body>
</html>		