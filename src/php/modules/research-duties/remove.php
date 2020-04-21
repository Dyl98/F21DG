<?php
	include_once('../../core/protect.php');
	include_once('controller.php');
	
	if (isset($_POST['id2delete'])) {
		/* Call function from controller.php and pass id variable */
		remove_research_duty($_POST['id2delete']);
		
		/* On succesful transaction, attempt to redirect to main page */
		echo "
			<script language=javascript>
				setTimeout(\"location.href='../research-duties/'\",[0]);
			</script>
			<noscript>
				Everything worked out great! <a href=\"../research-duties/\">Click here to see the results.</a>
			</noscript>
		";
	}

	$active = 'research-duties';
	include_once('../../ui-layout/header.inc');
?>
<div id="dynamic-column">
	<div id="backbar">
		<ul class="toolbar-buttons"><!-- Only ever one button to take you to the previous interface screen -->
			<li id="_helpBack" class="back-button"><a href="../research-duties/" class="_help-show-staff-list">Research Duties</a></li>
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
			<span class="admin-row-name">Delete Selected Research Duty</span>
		</div>
		<div>
			<form action="#" method="post" class="form"><br/>
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
				<h2>You are about to delete the following research duty:</h2>
				<br />
				<h2><?php echo $research[0]['name']; ?></h2>
				<br />
				<?php
					$staff = get_staff_by_research($_GET["id"]);
					
					$counter = 0;
					echo "<h2>Assigned staff members:</h2>";
						foreach($staff as $staff_single) {
						$counter++;					
						echo "<h3><a href=\"../staff-members/edit.php?id=".$staff_single['staffid']."\">".$staff_single['forename']." ".$staff_single['surname']."</a></h3>";
					}
					if ($counter == 0) { echo "<h3>(No staff members assigned to this research duty)</h3>"; }
				?>
				<br /><br />
				This action is permanent, there is no undo. Are you sure you want to proceed?<br/><br/>
				<input type="hidden" value="<?php echo $_GET['id'];?>" name="id2delete" />
				<a href="."><input type="button" value="No, Cancel"/></a><input type="submit" value="Yes, Delete Research Duty"/>
			</form>
		</div>
	</div>
</div>
<?php include_once('../../ui-layout/footer.inc'); ?>

