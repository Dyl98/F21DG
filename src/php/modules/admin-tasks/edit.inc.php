<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../admin-tasks/" class="_help-show-admin-list">Admin Tasks</a></li>
		</ul>
	</div>
	<div id="toolbar">
		<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
			<li id="_helpLogout" class="red-button"><a href="../../core/logout.php">Logout</a></li>
			<li id="_helpRemove" class="red-button"><a href="remove.php?id=<?php echo $_GET["id"]; ?>">Delete Selected Admin Task</a></li>
		</ul>
	</div>
	<div id="timebar">
		<ul class="timebar-buttons">
			<li class="label">Show:</li>
			<li id="_help-show-overview"><a href="#">Overview</a></li>
			<li id="_help-show-details"><a href="#">Admin Task Details</a></li>
			<li id="_help-show-assigned-staff"><a href="#">Assigned Staff Members</a></li>
		</ul>
	</div>
	<div id="content"><!-- Main content area where all information is displayed -->
		<div id="overview" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Admin Task Overview
			</div>
			<?php
				$admin = get_admin_info($_GET["id"]);
				if ($admin == Array()) {
					echo "
						<script language=javascript>
							setTimeout(\"location.href='../admin-tasks/'\",[0]);
						</script>
						<noscript>
							This admin task does not exist. <a href=\"../admin-tasks/\">Click here to return to the previous page.</a>
						</noscript>
					";
				}
			?>
			<div class="form">
				<h1><?php echo $admin[0]['name']; ?></h1>
				<br />
				<?php
					$staff = get_staff_by_admin($_GET["id"]);
					$parameters = $_GET["id"];
					$temp = "";
					
					$counter = 0;
					foreach($staff as $staff_single) {
						$counter++;					
						$parameters .= ':'.$staff_single['staffid'].':'.$staff_single['percentage'];
						
						$temp .= "<h3><a href=\"../staff-members/edit.php?id=".$staff_single['staffid']."\">".$staff_single['forename']." ".$staff_single['surname']."</a></h3>";
					}
					echo '<img src="../graphs-and-charts/admin-pie.php?data='.$parameters.'" width="420px" height="250px" />';
					echo '<br /><br />';
					echo "<h2>Assigned staff members:</h2>";
					echo $temp;
					if ($counter == 0) { echo "<h3>(No staff members assigned to this admin task)</h3>"; }
				?>
			</div>
		</div>
		<div id="details" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Admin Task Details
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php edit_admin_task($_GET["id"]); ?>
		</div>
		<div id="assigned-staff" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				<span class="staff-row-name">Name</span>
				<span class="staff-row-email">E-Mail</span>
				<span class="staff-row-workload">Percentage</span>
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php view_admin_task_xref($_GET["id"]); ?>

			<div class="column-headers"><!-- Column headers -->
				Assign a New Staff Member
			</div>
			<!-- Call function from controller.php -->
			<?php add_admin_task_xref($_GET["id"]); ?>
		</div>
	</div>
</div>
