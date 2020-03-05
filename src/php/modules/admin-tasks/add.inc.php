<?php
	session_start();
        include_once('../../core/protect.php');
?>

<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../admin-tasks/" class="_help-show-admin-list">Admin Tasks</a></li>
		</ul>
	</div>
	<div id="toolbar">
		<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
			<li id="_helpLogout" class="red-button"><a href="../../core/logout.php">Logout</a></li>
		</ul>
	</div>
	<div id="timebar">
		
	</div>
	<div id="content"><!-- Main content area where all information is displayed -->
		<div id="admin-task-details" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Admin Task Details
			</div>
			<!-- Call function from controller.php -->
			<?php add_admin_task(); ?>
		</div>
	</div>
</div>
