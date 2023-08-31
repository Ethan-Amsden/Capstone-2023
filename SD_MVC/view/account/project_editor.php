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
				<!-- <ul id="toollist">	
					<li><img src="../assets/images/editor-icons/Italic-btn.png" class="tool" alt="Italic text button"></li>
					<li><img src="../assets/images/editor-icons/Underline-btn.png" class="tool" alt="Underline text button"></li>
					<li><img src="../assets/images/editor-icons/Strikethrough-btn.png" class="tool" alt="Strike through button"></li>
					<li><img src="../assets/images/editor-icons/Font-size.png" class="tool" alt="Font size button"></li>
					<li><img src="../assets/images/editor-icons/Font-style.png" class="tool" alt="Font style button"></li>
					<li><img src="../assets/images/editor-icons/Center-align.png" class="tool" alt="Center align button"></li>
					<li><img src="../assets/images/editor-icons/Right-align.png" class="tool" alt="Right align button"></li>
					<li><img src="../assets/images/editor-icons/Left-align.png" class="tool" alt="left align button"></li>
					<li><img src="../assets/images/editor-icons/Open-file.png" class="tool" alt="Open file button"></li>
					<li><img src="../assets/images/editor-icons/Close.png" class="tool" id="closebtn"alt="Close button"></li>
				</ul> -->
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
					<!--
					<button type="button" class="button" data-element="fontSize">
						<img src="../assets/images/editor-icons/Font-size.png" class="tool" alt="Font size button">
					</button>
					-->
					<button type="button" class="button" data-element="justifyCenter">
						<img src="../assets/images/editor-icons/Center-align.png" class="tool" alt="Center align button">
					</button>
					<button type="button" class="button" data-element="justifyRight">
						<img src="../assets/images/editor-icons/Right-align.png" class="tool" alt="Right align button">
					</button>
					<button type="button" class="button" data-element="justifyLeft">
						<img src="../assets/images/editor-icons/Left-align.png" class="tool" alt="left align button">
					</button>
					<!--
					<button type="button" class="button" data-element="openFile">
						<img src="../assets/images/editor-icons/Open-file.png" class="tool" alt="Open file button">
					</button>
					-->
				</div>
			</aside>
			
			<form action="." method="post" id="project_editor_form">

				<input type="hidden" name="action" value="update_project">

				<input type="hidden" name="project_id" value="<?php echo $project['Project_Id']?>">
				<input type="hidden" name="project_last_saved" value="<?php echo date("Y-m-d")?>">
				<input type="hidden" name="project_time_saved" value="<?php echo date("h:i:sa")?>">

				<div id="manuscript" contenteditable="true" value="<?php echo $project['Project_Manuscript']?>"><?php echo urldecode($project['Project_Manuscript']);?></div>
				
				<textarea id="db-manuscript" name="edit_project"></textarea>

				<div class="progress-container" id="counters">

					<button class="button submit-button" type="submit">Save Progress</button>

					<!--
					<p class="progress" id="wc">Word Count: <span></span></p>
					<p class="progress" id="cc">Character Count: <span></span></p>
					-->
					<p class="progress" id="project-title">Project: <?php echo $project['Project_Title']?></p>
					<p id="save-rec">Last saved:<span id="saved-date"> <?php echo $project['Project_LastUpdated'] . " " . $project['Project_TimeUpdated'];?></span></p>

					<p>
						<?php if(isset($message)) {?>
                			<span class="error"><?php echo $message;?></span>
            			<?php }?>
					</p>

				</div>

			</form>

			

		</section>
		
	</main>
	<script src="../../main.js"></script>
</body>
</html>