<?php
	include_once('../../core/protect.php');
	include_once('../../core/engine.php');
	include_once('controller.php'); //TODO is this actually needed?

	if (isset($_POST['id2delete'])) {
		/* Call function from engine.php and pass id variable */
		delete_task($_POST['id2delete']);

		/* On succesful transaction, attempt to redirect to main page */
		echo "
			<script language=javascript>
				setTimeout(\"location.href='../admin-tasks/'\",[0]);
			</script>
			<noscript>
				Everything worked out great! <a href=\"../admin-tasks/\">Click here to see the results.</a>
			</noscript>
		";
	}

	$active = 'admin-tasks';
	include_once('../../ui-layout/header.inc');
?>
<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../admin-tasks/" class="_help-show-staff-list">Admin tasks</a></li>
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
			<span class="admin-row-name">Delete Selected Admin Task</span>
		</div>
		<div>
			<form action="#" method="post" class="form"><br/>
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
						break;
					}
				?>
				<h2>You are about to delete the following admin task:</h2>
				<br />
				<h2><?php echo $admin[0]['name']; ?></h2>
				<br />
				<?php
					$staff = get_staff_by_admin($_GET["id"]);

					$counter = 0;
					echo "<h2>Assigned staff members:</h2>";
						foreach($staff as $staff_single) {
						$counter++;
						echo "<h3><a href=\"../staff-members/edit.php?id=".$staff_single['StaffID']."\">".$staff_single['Forename']." ".$staff_single['Surname']."</a></h3>";
					}
					if ($counter == 0) { echo "<h3>(No staff members assigned to this admin task)</h3>"; }
				?>
				<br /><br />
				This action is permanent, there is no undo. Are you sure you want to proceed?<br/><br/>
				<input type="hidden" value="<?php echo $_GET['id'];?>" name="id2delete" />
				<a href="."><input type="button" value="No, Cancel"/></a><input type="submit" value="Yes, Delete Admin Task"/>
			</form>
		</div>
	</div>
</div>
<?php include_once('../../ui-layout/footer.inc'); ?>

