<?php
	require_once('controller.php');
        include_once('../../core/protect.php');
?>
	<div class="column-headers"><!-- Column headers -->
		<span class="module-row-code">Module Code</span>
		<span class="module-row-name">Module Name</span>
		<span class="module-row-weighting">Weighting</span>
	</div>
<?php
	show_current_modules();
?>
