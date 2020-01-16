<?php
	include_once('../../core/protect.php');
	include_once('controller.php');
	
	if (isset($_POST['id2delete'])) {
		/* Call function from controller.php and pass id variable */
		remove_module($_POST['id2delete']);
		
		/* On succesful transaction, attempt to redirect to main page */
		echo "
			<script language=javascript>
				setTimeout(\"location.href='../current-modules/'\",[0]);
			</script>
			<noscript>
				Everything worked out great! <a href=\"../current-modules/\">Click here to see the results.</a>
			</noscript>
		";
	}
	$active = 'current-modules';
	include_once('../../ui-layout/header.inc');
?>

<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../current-modules/" class="_help-show-staff-list">Current Modules</a></li>
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
			<span class="admin-row-name">Delete Selected Module</span>
		</div>
		<div>
			<form action="#" method="post" class="form"><br/>
				<?php
					$module = get_module_info($_GET["id"]);
					if ($module == Array()) {
						echo "
							<script language=javascript>
								setTimeout(\"location.href='../current-modules/'\",[0]);
							</script>
							<noscript>
								This module does not exist. <a href=\"../current-modules/\">Click here to return to the previous page.</a>
							</noscript>
						";
						break;
					}
				?>
				<h2>You are about to delete the following module:</h2>
				<br />
				<h2><?php echo $module[0]['code']." - ".$module[0]['name']; ?></h2>
				<h3><a href="<?php echo $module[0]['descriptor']; ?>"><?php echo $module[0]['descriptor']; ?></a></h3>
				<br />
				<?php
					$staff = get_staff_by_module($_GET["id"]);
					
					$counter = 0;
					echo "<h2>Assigned staff members:</h2>";
						foreach($staff as $staff_single) {
						$counter++;					
						echo "<h3><a href=\"../staff-members/edit.php?id=".$staff_single['staffid']."\">".$staff_single['forename']." ".$staff_single['surname']."</a></h3>";
					}
					if ($counter == 0) { echo "<h3>(No staff members assigned to this module)</h3>"; }
				?>
				<br /><br />
				This action is permanent, there is no undo. Are you sure you want to proceed?<br/><br/>
				<input type="hidden" value="<?php echo $_GET['id'];?>" name="id2delete" />
				<a href="."><input type="button" value="No, Cancel"/></a><input type="submit" value="Yes, Delete Module"/>
			</form>
		</div>
	</div>
</div>
<?php include_once('../../ui-layout/footer.inc'); ?>
