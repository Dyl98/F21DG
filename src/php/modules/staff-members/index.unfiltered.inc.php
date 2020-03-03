<?php
	require_once('controller.php');
        include_once('../../core/protect.php');
?>
	<div class="column-headers"><!-- Column headers -->
		<span class="staff-row-name">Name</span>
		<span class="staff-row-email">E-Mail</span>
		<span class="staff-row-workload">Workload</span>
	</div>
<?php
	show_staff_members();
?>
