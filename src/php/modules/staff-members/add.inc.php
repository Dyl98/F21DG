<?php
	session_start();
        include_once('../../core/protect.php');
?>
<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../staff-members/" class="_help-show-staff-list">Staff Members</a></li>
		</ul>
	</div>
	<div id="toolbar">
		<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
			<li id="_helpLogout" class="red-button"><a href="../../core/logout.php">Logout</a></li>
		</ul>
	</div>
	<div id="timebar">
		<!-- Buttons for filtering available details. Disabled due to complexity -->
<!--
		<ul class="timebar-buttons">
			<li class="label">Show:</li>
			<li><a href="#">Overview</a></li>
			<li><a href="#">Personal Details</a></li>
			<li><a href="#">Assigned Modules</a></li>
			<li><a href="#">Assigned Admin Tasks</a></li>
			<li><a href="#">Assigned Research Duties</a></li>
		</ul>
-->
	</div>
	<div id="content"><!-- Main content area where all information is displayed -->
		<div id="personal-details" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Personal Details
			</div>
			<!-- Call function from controller.php -->
			<?php add_staff_member(); ?>
		</div>
	</div>
</div>
