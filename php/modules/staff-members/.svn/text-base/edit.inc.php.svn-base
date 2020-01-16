<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../staff-members/" class="_help-show-staff-list">Staff Members</a></li>
		</ul>
	</div>
	<div id="toolbar">
		<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
			<li id="_helpLogout" class="red-button"><a href="../../core/logout.php">Logout</a></li>
			<li id="_helpRemove" class="red-button"><a href="remove.php?id=<?php echo $_GET["id"]; ?>">Delete Selected Staff Member</a></li>
		</ul>
	</div>
	<div id="timebar">
		<!-- Buttons for filtering available details. -->
		<ul class="timebar-buttons">
			<li class="label">Show:</li>
			<li id="_help-show-overview"><a href="#">Overview</a></li>
			<li id="_help-show-details"><a href="#">Personal Details</a></li>
			<li id="_help-show-assigned-modules"><a href="#">Assigned Modules</a></li>
			<li id="_help-show-assigned-admin-tasks"><a href="#">Assigned Admin Tasks</a></li>
			<li id="_help-show-assigned-research-duties"><a href="#">Assigned Research Duties</a></li>
		</ul>
	</div>
	<div id="content"><!-- Main content area where all information is displayed -->
		<div id="overview" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Overview
			</div>
			<?php
				$staff = get_staff_info($_GET["id"]);
				if ($staff == Array()) {
					echo "
						<script language=javascript>
							setTimeout(\"location.href='../staff-members/'\",[0]);
						</script>
						<noscript>
							This user does not exist. <a href=\"../staff-members/\">Click here to return to the previous page.</a>
						</noscript>
					";
					break;
				}
			?>
			<div class="form">
				<h1><?php echo $staff[0]['forename']." ".$staff[0]['surname']; ?></h1>
				<h2><a href="mailto:<?php echo $staff[0]['email']; ?>"><?php echo $staff[0]['email']; ?></a></h2>
				<br />
				<img src="../graphs-and-charts/staff-pie.php?staffid=<?php echo $_GET["id"]; ?>" width="420px" height="250px" alt=""/>
				<br />
				<br />
				<?php
					$modules = get_modules_by_staff($_GET["id"]);
					$tasks = get_tasks_by_staff($_GET["id"]);
					$duties = get_duties_by_staff($_GET["id"]);
					
					$counter = 0;
					echo "<h2>Assigned modules:</h2>";
					foreach($modules as $module) {
						$counter++;
						echo "  <h3><a href=\"../current-modules/edit.php?id=".$module['moduleid']."\">".$module['code']." - ".$module['name']."</a></h3>";
					}
					if ($counter == 0) { echo "<h3>(No modules assigned to this staff member)</h3>"; }
					echo "<br />";
					
					$counter = 0;
					echo "<h2>Assigned admin tasks:</h2>";
					foreach($tasks as $task) {
						$counter++;
						echo "<h3><a href=\"../admin-tasks/edit.php?id=".$task['adminid']."\">".$task['name']."</a></h3>";
					}
					if ($counter == 0) { echo "<h3>(No admin tasks assigned to this staff member)</h3>"; }
					echo "<br />";
					
					$counter = 0;
					echo "<h2>Assigned research duties:</h2>";
						foreach($duties as $duty) {
						$counter++;					
						echo "<h3><a href=\"../research-duties/edit.php?id=".$duty['researchid']."\">".$duty['name']."</a></h3>";
					}
					if ($counter == 0) { echo "<h3>(No research duties assigned to this user)</h3>"; }
				?>
			</div>
		</div>
		<div id="details" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Personal Details
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php edit_staff_member($_GET["id"]); ?>
		</div>
		<div id="assigned-modules" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				<span class="module-row-code">Module Code</span>
				<span class="module-row-name">Module Name</span>
				<span class="module-row-weighting">Percentage</span>
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php view_module_xref($_GET["id"]); ?>

			<div class="column-headers"><!-- Column headers -->
				Assign a New Module
			</div>
			<!-- Call function from controller.php -->
			<?php add_module_xref($_GET["id"]); ?>
		</div>
		<div id="assigned-admin-tasks" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				<span class="admin-row-name">Task Name</span>
				<span class="admin-row-description">Task Description</span>
				<span class="admin-row-weighting">Percentage</span>
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php view_admin_task_xref($_GET["id"]); ?>

			<div class="column-headers"><!-- Column headers -->
				Assign a New Admin Task
			</div>
			<!-- Call function from controller.php -->
			<?php add_admin_task_xref($_GET["id"]); ?>
		</div>
		<div id="assigned-research-duties" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				<span class="research-row-name">Duty Name</span>
				<span class="research-row-type">Duty Type</span>
				<span class="research-row-description">Duty Description</span>
				<span class="research-row-weighting">Percentage</span>
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php view_research_duty_xref($_GET["id"]); ?>

			<div class="column-headers"><!-- Column headers -->
				Assign a New Research Duty
			</div>
			<!-- Call function from controller.php -->
			<?php add_research_duty_xref($_GET["id"]); ?>
		</div>
	</div>
</div>
