<?php
	require_once('controller.php');
        include_once('../../core/protect.php');
?>
	<div class="column-headers"><!-- Column headers -->
		<span class="admin-row-name">Task Name</span>
		<span class="admin-row-description">Task Description</span>
		<span class="admin-row-weighting">Weighting</span>
	</div>
<?php
	show_admin_tasks_filtered($_GET["period"]);
?>
