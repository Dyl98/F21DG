<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../research-duties/" class="_help-show-research-list">Research Duties</a></li>
		</ul>
	</div>
	<div id="toolbar">
		<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
			<li id="_helpLogout" class="red-button"><a href="../../core/logout.php">Logout</a></li>
			<li id="_helpRemove" class="red-button"><a href="remove.php?id=<?php echo $_GET["id"]; ?>">Delete Selected Research Duty</a></li>
		</ul>
	</div>
	<div id="timebar">
		<ul class="timebar-buttons">
			<li class="label">Show:</li>
			<li id="_help-show-overview"><a href="#">Overview</a></li>
			<li id="_help-show-details"><a href="#">Research Duty Details</a></li>
			<li id="_help-show-assigned-staff"><a href="#">Assigned Staff Members</a></li>
		</ul>
	</div>
	<div id="content"><!-- Main content area where all information is displayed -->
		<div id="overview" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Research Duty Overview
			</div>
			<?php
				$research = get_research_info($_GET["id"]);
				if ($research == Array()) {
					echo "
						<script language=javascript>
							setTimeout(\"location.href='../research-duties/'\",[0]);
						</script>
						<noscript>
							This research duty does not exist. <a href=\"../research-duties/\">Click here to return to the previous page.</a>
						</noscript>
					";
					break;
				}
			?>
			<div class="form">
				<h1><?php echo $research[0]['name']; ?></h1>
				<br />
				<?php
					$staff = get_staff_by_research($_GET["id"]);
					$parameters = $_GET["id"];
					$temp = "";
					
					$counter = 0;
					foreach($staff as $staff_single) {
						$counter++;					
						$parameters .= ':'.$staff_single['staffid'].':'.$staff_single['percentage'];
						
						$temp .= "<h3><a href=\"../staff-members/edit.php?id=".$staff_single['staffid']."\">".$staff_single['forename']." ".$staff_single['surname']."</a></h3>";
					}
					echo '<img src="../graphs-and-charts/research-pie.php?data='.$parameters.'" width="420px" height="250px" />';
					echo '<br /><br />';
					echo "<h2>Assigned staff members:</h2>";
					echo $temp;
					if ($counter == 0) { echo "<h3>(No staff members assigned to this research duty)</h3>"; }
				?>
			</div>
		</div>
		<div id="details" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				Research Duty Details
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php edit_research_duty($_GET["id"]); ?>
		</div>
		<div id="assigned-staff" class="slide-panel">
			<div class="column-headers"><!-- Column headers -->
				<span class="staff-row-name">Name</span>
				<span class="staff-row-email">E-Mail</span>
				<span class="staff-row-workload">Percentage</span>
			</div>
			<!-- Call function from controller.php and pass id variable -->
			<?php view_research_duty_xref($_GET["id"]); ?>

			<div class="column-headers"><!-- Column headers -->
				Assign a New Staff Member
			</div>
			<!-- Call function from controller.php -->
			<?php add_research_duty_xref($_GET["id"]); ?>
		</div>
	</div>
</div>
