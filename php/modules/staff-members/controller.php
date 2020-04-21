<?php
	require_once('../../core/engine.php');
	require_once('../../core/protect.php');
?>


<?php
	function show_staff_members() {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$staff_members = $sql_connection->query_database("SELECT * FROM staff_members ORDER BY forename ASC");

		/* Loop and display query results */
		foreach($staff_members as $staff_member){
?>
			<div id="<?php echo $staff_member["staffid"]; ?>" class="row-entry"><!-- Row entry for staff member -->
				<a href="edit.php?id=<?php echo $staff_member["staffid"]; ?>">
					<span class="staff-row-name"><?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?></span>
					<span class="staff-row-email"><?php if($staff_member["email"]!="") {echo $staff_member["email"];} else { echo "E-Mail not entered"; } ?></span>
					<span class="staff-row-workload"><img src="../graphs-and-charts/staff-bar-rotated.php?staffid=<?php echo $staff_member["staffid"]; ?>" alt="Graph Error" width="150px" height="16px" id="_helpStaffBar" /></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function show_staff_members_filtered($period) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$staff_members = $sql_connection->query_database("SELECT * FROM staff_members WHERE availability".$period." = 1 ORDER BY forename ASC");

		/* Loop and display query results */
		foreach($staff_members as $staff_member){
?>
			<div id="<?php echo $staff_member["staffid"]; ?>" class="row-entry"><!-- Row entry for staff member -->
				<a href="edit.php?id=<?php echo $staff_member["staffid"]; ?>">
					<span class="staff-row-name"><?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?></span>
					<span class="staff-row-email"><?php if($staff_member["email"]!="") {echo $staff_member["email"];} else { echo "E-Mail not entered"; } ?></span>
					<span class="staff-row-workload"><img src="../graphs-and-charts/staff-bar-rotated.php?staffid=<?php echo $staff_member["staffid"]; ?>" alt="Graph Error" width="150px" height="16px" id="_helpStaffBar" /></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function add_staff_member() {
?>
		<!-- Send form contents to add-form.php -->
		<form id="add-staff-member" class="form" method="post" action="add-form.php">
			<label class="form-label">Forename: </label>
			<input name="forename" class="form-field" type="text" size="25" value="" />
			<br />
			<br />
			<label class="form-label">Surname: </label>
			<input name="surname" class="form-field" type="text" size="25" value="" />
			<br />
			<br />
			<label class="form-label">E-Mail: </label>
			<input name="email" class="form-field" type="text" size="25" value="" />
			<br />
			<br />
			<label class="form-label">Availability: </label>
			<span class="checkbox">
				<input type="checkbox" name="availability1" value="1" />1st Semester&nbsp;
				<input type="checkbox" name="availability2" value="1" />Christmas&nbsp;
				<input type="checkbox" name="availability3" value="1" />2nd Semester&nbsp;
				<input type="checkbox" name="availability4" value="1" />Easter&nbsp;
				<input type="checkbox" name="availability5" value="1" />3rd Semester&nbsp;
			</span>
			<br />
			<br />
			<label class="form-label">&nbsp;</label>
			<span class="checkbox"><input type="submit" value="Add Staff Member" /></span>
		</form>
<?php
		return;
	}
?>


<?php
	function edit_staff_member($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$staff_members = $sql_connection->query_database("SELECT * FROM staff_members WHERE staffid=".$staffid." ORDER BY forename ASC");

		/* Loop and display query results */
		foreach($staff_members as $staff_member){
?>
			<!-- Send form contents to edit-form.php -->
			<form id="edit-staff-member" class="form" method="post" action="edit-form.php">
				<input type="hidden" name="staffid" value="<?php echo $staff_member["staffid"]; ?>" />
				<label class="form-label">Forename: </label>
				<input name="forename" class="form-field" type="text" size="25" value="<?php echo $staff_member["forename"]; ?>" />
				<br />
				<br />
				<label class="form-label">Surname: </label>
				<input name="surname" class="form-field" type="text" size="25" value="<?php echo $staff_member["surname"]; ?>" />
				<br />
				<br />
				<label class="form-label">E-Mail: </label>
				<input name="email" class="form-field" type="text" size="25" value="<?php echo $staff_member["email"]; ?>" />
				<br />
				<br />
				<label class="form-label">Availability: </label>
				<span class="checkbox">
					<input type="checkbox" name="availability1" value="1"<?php if($staff_member["availability1"] == 1) echo " checked=\"checked\""; ?> />1st Semester&nbsp;
					<input type="checkbox" name="availability2" value="1"<?php if($staff_member["availability2"] == 1) echo " checked=\"checked\""; ?> />Christmas&nbsp;
					<input type="checkbox" name="availability3" value="1"<?php if($staff_member["availability3"] == 1) echo " checked=\"checked\""; ?> />2nd Semester&nbsp;
					<input type="checkbox" name="availability4" value="1"<?php if($staff_member["availability4"] == 1) echo " checked=\"checked\""; ?> />Easter&nbsp;
					<input type="checkbox" name="availability5" value="1"<?php if($staff_member["availability5"] == 1) echo " checked=\"checked\""; ?> />3rd Semester&nbsp;
				</span>
				<br />
				<br />
				<label class="form-label">&nbsp;</label>
				<span class="checkbox"><input type="submit" value="Apply Changes" /></span>
			</form>
			<br />
<?php
		}
		return;
	}
?>


<?php
	function remove_staff_member($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("DELETE FROM staff_members WHERE staffid = ".$staffid);
		$sql_connection->add_query("DELETE FROM current_modules_xref WHERE staffid = ".$staffid);
		$sql_connection->add_query("DELETE FROM admin_tasks_xref WHERE staffid = ".$staffid);
		$sql_connection->add_query("DELETE FROM research_duties_xref WHERE staffid = ".$staffid);
		$result = $sql_connection->query();
		return;
	}
?>


<?php
	function add_module_xref($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$current_modules = $sql_connection->query_database("SELECT DISTINCT * FROM current_modules WHERE (current_modules.moduleid) NOT IN ( SELECT current_modules_xref.moduleid FROM current_modules_xref WHERE current_modules_xref.staffid = ".$staffid.") ORDER BY name ASC");

		if(count($current_modules) > 0){
?>
		<!-- Send form contents to add-form-xref.php -->
		<form id="add-module-xref" class="form" method="post" action="add-form-current-modules-xref.php?staffid=<?php echo $staffid; ?>">
			<input type="hidden" name="staffid" value="<?php echo $staffid; ?>" />
			<label class="form-label">Current Modules: </label>
			<select name="moduleid" class="form-field">
<?php
				foreach($current_modules as $current_module){
?>
					<option value="<?php echo $current_module["moduleid"]; ?>">
						<?php if($current_module["code"]!="") {echo $current_module["code"];} else { echo "Module code not entered"; } ?>
						&nbsp;-&nbsp;
						<?php if($current_module["name"]!="") {echo $current_module["name"];} else { echo "Module name not entered"; } ?>
					</option>
<?php
				}
?>
			</select>
			<br />
			<br />
			<label class="form-label">Percentage Taken: </label>
			<select name="percentage" class="form-field">
			<?php for($counter = 1; $counter < 101; $counter++){ ?>
				<option><?php echo $counter; ?></option>
			<?php } ?>
			</select>
			<br />
			<br />
			<label class="form-label">&nbsp;</label>
			<span class="checkbox"><input type="submit" value="Assign Module" /></span>
		</form>
		<br />
<?php
		} else {
?>
			<div class="row-entry"><h3>Unable to assign any more modules</h3></div>
<?php
		}
		return;
	}
?>


<?php
	function view_module_xref($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$current_modules = $sql_connection->query_database("SELECT current_modules_xref.staffid, current_modules_xref.moduleid, current_modules_xref.percentage, current_modules.moduleid, current_modules.code, current_modules.name FROM current_modules_xref, current_modules WHERE (current_modules_xref.staffid = \"".$staffid."\") AND (current_modules_xref.moduleid = current_modules.moduleid) ORDER BY name ASC");

		/* Loop and display query results */
		foreach($current_modules as $current_module){
?>
			<div id="<?php echo $current_module["moduleid"]; ?>" class="row-entry"><!-- Row entry for module -->

					<span class="module-row-code"><?php if($current_module["code"]!="") {echo $current_module["code"];} else { echo "Code not entered"; } ?></span>
					<span class="module-row-name"><?php if($current_module["name"]!="") {echo $current_module["name"];} else { echo "Module name not entered"; } ?></span>
					<span class="module-row-weighting"><?php echo $current_module["percentage"]."&#37;"; ?></span>
					<span class="row-link row-link-red"><a href="remove-current-modules-xref.php?staffid=<?php echo $staffid; ?>&moduleid=<?php echo $current_module["moduleid"]; ?>">Unassign</a></span>

			</div>
<?php
		}
		return;
	}
?>


<?php
	function remove_module_xref($staffid,$moduleid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("DELETE FROM current_modules_xref WHERE (staffid = ".$staffid.") AND (moduleid = ".$moduleid.")");
		$result = $sql_connection->query();
		return;
	}
?>


<?php
	function add_admin_task_xref($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$admin_tasks = $sql_connection->query_database("SELECT DISTINCT * FROM admin_tasks WHERE (admin_tasks.adminid) NOT IN ( SELECT admin_tasks_xref.adminid FROM admin_tasks_xref WHERE admin_tasks_xref.staffid = ".$staffid.") ORDER BY name ASC");

		if(count($admin_tasks) > 0){
?>
		<!-- Send form contents to add-form-xref.php -->
		<form id="add-admin-task-xref" class="form" method="post" action="add-form-admin-tasks-xref.php?staffid=<?php echo $staffid; ?>">
			<input type="hidden" name="staffid" value="<?php echo $staffid; ?>" />
			<label class="form-label">Admin Tasks: </label>
			<select name="adminid" class="form-field">
<?php
				foreach($admin_tasks as $admin_task){
?>
					<option value="<?php echo $admin_task["adminid"]; ?>">
						<?php if($admin_task["name"]!="") {echo $admin_task["name"];} else { echo "Task name not entered"; } ?>
						&nbsp;-&nbsp;
						<?php if($admin_task["description"]!="") {echo $admin_task["description"];} else { echo "Task description not entered"; } ?>
					</option>
<?php
				}
?>
			</select>
			<br />
			<br />
			<label class="form-label">Percentage Taken: </label>
			<select name="percentage" class="form-field">
			<?php for($counter = 1; $counter < 101; $counter++){ ?>
				<option><?php echo $counter; ?></option>
			<?php } ?>
			</select>
			<br />
			<br />
			<label class="form-label">&nbsp;</label>
			<span class="checkbox"><input type="submit" value="Assign Admin Task" /></span>
		</form>
		<br />
<?php
		} else {
?>
			<div class="row-entry"><h3>Unable to assign any more admin tasks</h3></div>
<?php
		}
		return;
	}
?>


<?php
	function view_admin_task_xref($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$admin_tasks = $sql_connection->query_database("SELECT admin_tasks_xref.staffid, admin_tasks_xref.adminid, admin_tasks_xref.percentage, admin_tasks.adminid, admin_tasks.name, admin_tasks.description FROM admin_tasks_xref, admin_tasks WHERE (admin_tasks_xref.staffid = \"".$staffid."\") AND (admin_tasks_xref.adminid = admin_tasks.adminid) ORDER BY name ASC");

		/* Loop and display query results */
		foreach($admin_tasks as $admin_task){
?>
			<div id="<?php echo $admin_task["adminid"]; ?>" class="row-entry"><!-- Row entry for admin task -->

					<span class="admin-row-name"><?php if($admin_task["name"]!="") {echo $admin_task["name"];} else { echo "Name not entered"; } ?></span>
					<span class="admin-row-description"><?php if($admin_task["description"]!="") {echo $admin_task["description"];} else { echo "Description not entered"; } ?></span>
					<span class="admin-row-weighting"><?php echo $admin_task["percentage"]."&#37;"; ?></span>
					<span class="row-link row-link-red"><a href="remove-admin-tasks-xref.php?staffid=<?php echo $staffid; ?>&adminid=<?php echo $admin_task["adminid"]; ?>">Unassign</a></span>

			</div>
<?php
		}
		return;
	}
?>


<?php
	function add_research_duty_xref($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$research_duties = $sql_connection->query_database("SELECT DISTINCT * FROM research_duties WHERE (research_duties.researchid) NOT IN ( SELECT research_duties_xref.researchid FROM research_duties_xref WHERE research_duties_xref.staffid = ".$staffid.") ORDER BY name ASC");

		if(count($research_duties) > 0){
?>
		<!-- Send form contents to add-form-xref.php -->
		<form id="add-research-duty-xref" class="form" method="post" action="add-form-research-duties-xref.php?staffid=<?php echo $staffid; ?>">
			<input type="hidden" name="staffid" value="<?php echo $staffid; ?>" />
			<label class="form-label">Research Duties: </label>
			<select name="researchid" class="form-field">
<?php
				foreach($research_duties as $research_duty){
?>
					<option value="<?php echo $research_duty["researchid"]; ?>">
						<?php if($research_duty["name"]!="") {echo $research_duty["name"];} else { echo "Duty name not entered"; } ?>
						&nbsp;-&nbsp;
						<?php if($research_duty["description"]!="") {echo $research_duty["description"];} else { echo "Duty description not entered"; } ?>
					</option>
<?php
				}
?>
			</select>
			<br />
			<br />
			<label class="form-label">Percentage Taken: </label>
			<select name="percentage" class="form-field">
			<?php for($counter = 1; $counter < 101; $counter++){ ?>
				<option><?php echo $counter; ?></option>
			<?php } ?>
			</select>
			<br />
			<br />
			<label class="form-label">&nbsp;</label>
			<span class="checkbox"><input type="submit" value="Assign Research Duty" /></span>
		</form>
		<br />
<?php
		} else {
?>
			<div class="row-entry"><h3>Unable to assign any more research duties</h3></div>
<?php
		}
		return;
	}
?>


<?php
	function view_research_duty_xref($staffid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$research_duties = $sql_connection->query_database("SELECT research_duties_xref.staffid, research_duties_xref.researchid, research_duties_xref.percentage, research_duties.researchid, research_duties.name, research_duties.researchtype, research_duties.description FROM research_duties_xref, research_duties WHERE (research_duties_xref.staffid = \"".$staffid."\") AND (research_duties_xref.researchid = research_duties.researchid) ORDER BY name ASC");

		/* Loop and display query results */
		foreach($research_duties as $research_duty){
?>
			<div id="<?php echo $research_duty["researchid"]; ?>" class="row-entry"><!-- Row entry research duty -->

					<span class="research-row-name"><?php if($research_duty["name"]!="") {echo $research_duty["name"];} else { echo "Name not entered"; } ?></span>
					<span class="research-row-type"><?php if($research_duty["researchtype"]!="") {echo $research_duty["researchtype"];} else { echo "Type not entered"; } ?></span>
					<span class="research-row-description"><?php if($research_duty["description"]!="") {echo $research_duty["description"];} else { echo "Description not entered"; } ?></span>
					<span class="research-row-weighting"><?php echo $research_duty["percentage"]; ?></span>
					<span class="row-link row-link-red"><a href="remove-research-duties-xref.php?staffid=<?php echo $staffid; ?>&researchid=<?php echo $research_duty["researchid"]; ?>">Unassign</a></span>

			</div>
<?php
		}
		return;
	}
?>


<?php
	function remove_research_duty_xref($staffid,$researchid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("DELETE FROM research_duties_xref WHERE (staffid = ".$staffid.") AND (researchid = ".$researchid.")");
		$result = $sql_connection->query();
		return;
	}
?>
