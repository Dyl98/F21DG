<?php
	include_once('../../core/protect.php');
	include_once('controller.php');
	
	if (isset($_POST['id2delete'])) {
		/* Call function from controller.php and pass id variable */
		remove_staff_member($_POST['id2delete']);
		
		/* On succesful transaction, attempt to redirect to main page */
		echo "
			<script language=javascript>
				setTimeout(\"location.href='../staff-members/'\",[0]);
			</script>
			<noscript>
				Everything worked out great! <a href=\"../staff-members/\">Click here to see the results.</a>
			</noscript>
		";
	}
	$active = 'staff-members';
	include_once('../../ui-layout/header.inc');
?>

<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../staff-members/" class="_help-show-staff-list">Staff Members</a></li>
		</ul>
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
			<span class="admin-row-name">Delete Selected Staff Member</span>
		</div>
		<div>
			<form action="#" method="post" class="form"><br/>
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
				<h2>You are about to delete the following staff member:</h2>
				<br />
				<h2><?php echo $staff[0]['forename']." ".$staff[0]['surname']; ?></h2>
				<h3><a href="mailto:<?php echo $staff[0]['email']; ?>"><?php echo $staff[0]['email']; ?></a></h3>
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
						echo "<h3><a href=\"../research-duties/edit.php?id=".$dutie['researchidid']."\">".$dutie['name']."</a></h3>";
					}
					if ($counter == 0) { echo "<h3>(No research duties assigned to this user)</h3>"; }
				?>
				<br/>
				<br/>
				This action is permanent, there is no undo. Are you sure you want to proceed?<br/><br/>
				<input type="hidden" value="<?php echo $_GET["id"];?>" name="id2delete" />
				<a href="."><input type="button" value="No, Cancel"/></a><input type="submit" value="Yes, Delete Staff Member"/>
			</form>
		</div>
	</div>
</div>
<?php include_once('../../ui-layout/footer.inc'); ?>
