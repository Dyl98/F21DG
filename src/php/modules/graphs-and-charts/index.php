<?php
	session_start();
        include_once('../../core/protect.php');

	require_once('controller.php');
	$active = 'graphs-and-charts';
	include_once('../../ui-layout/header.inc');
?>
<div id="dynamic-column">
	<div id="backbar">
		
	</div>
	<div id="toolbar">
		<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
			<li class="red-button"><a href="../../core/logout.php" id="_helpLogout">Logout</a></li>
		</ul>
	</div>
	<div id="timebar">
		
	</div>
	<div id="content"><!-- Main content area where all information is displayed -->
		<div class="column-headers"><!-- Column headers -->
			<span class="admin-row-name">Graphs and Charts</span>
		</div>
	</div>
</div>
<?php include_once('../../ui-layout/footer.inc'); ?>
