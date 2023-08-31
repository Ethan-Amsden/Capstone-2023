<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
		<link rel="stylesheet" href="../../styles.css">
		<title>Editor</title>
	</head>

	<?php include '../../view/header.php'; ?>
	
	<main>
		<section class="workspace">
			<aside id="toolbar">

				<div id="toollist">
					<button type="button" class="button" data-element="bold">
						<img src="../assets/images/editor-icons/Bold-btn.png" class="tool" alt="Bold text button">
					</button>
					<button type="button" class="button" data-element="italic">
						<img src="../assets/images/editor-icons/Italic-btn.png" class="tool" alt="Italic text button">
					</button>
					<button type="button" class="button" data-element="underline">
						<img src="../assets/images/editor-icons/Underline-btn.png" class="tool" alt="Underline text button">
					</button>
					<button type="button" class="button" data-element="strikeThrough">
						<img src="../assets/images/editor-icons/Strikethrough-btn.png" class="tool" alt="Strike through button">
					</button>
					<button type="button" class="button" data-element="justifyCenter">
						<img src="../assets/images/editor-icons/Center-align.png" class="tool" alt="Center align button">
					</button>
					<button type="button" class="button" data-element="justifyRight">
						<img src="../assets/images/editor-icons/Right-align.png" class="tool" alt="Right align button">
					</button>
					<button type="button" class="button" data-element="justifyLeft">
						<img src="../assets/images/editor-icons/Left-align.png" class="tool" alt="left align button">
					</button>
				</div>
			</aside>
			
			<form action="." method="post" id="project_editor_form">

				<input type="hidden" name="action" value="update_project">
				<input type="hidden" name="project_id" value="<?php echo $project['Project_Id']?>">

				<div id="manuscript" contenteditable="true" value="<?php echo $project['Project_Manuscript']?>">

					<?php echo htmlspecialchars_decode($project['Project_Manuscript']);?>

				</div>
				<!--use the .Text() in the copy content from div to textarea-->
				<textarea id="db-manuscript" type="hidden" name="edit_project"></textarea>

				<div class="progress-container" id="counters">

					<button class="button submit-button" type="submit">Save Progress</button>

					<p class="progress" id="wc">Word Count: <span></span></p>
					<p class="progress" id="cc">Character Count: <span></span></p>
					<p id="save-rec">Last saved:<span id="saved-date"></span></p>

				</div>

			</form>

			

		</section>
		
	</main>
	<script src="../../main.js"></script>
</body>
</html>