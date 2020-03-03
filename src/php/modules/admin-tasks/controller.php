<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');
?>


<?php
	function show_admin_tasks() {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new CMySQL();
		$admin_tasks = $sql_connection->get_data("SELECT * FROM admin_tasks ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($admin_tasks as $admin_task){
?>
			<div id="<?php echo $admin_task["adminid"]; ?>" class="row-entry"><!-- Row entry for admin task -->
				<a href="edit.php?id=<?php echo $admin_task["adminid"]; ?>">
					<span class="admin-row-name"><?php if($admin_task["name"]!="") {echo $admin_task["name"];} else { echo "Name not entered"; } ?></span>
					<span class="admin-row-description"><?php if($admin_task["description"]!="") {echo $admin_task["description"];} else { echo "Description not entered"; } ?></span>
					<span class="admin-row-weighting"><?php echo $admin_task["weighting"]; ?></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function show_admin_tasks_filtered($period) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new CMySQL();
		$admin_tasks = $sql_connection->get_data("SELECT * FROM admin_tasks WHERE availability".$period." = 1 ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($admin_tasks as $admin_task){
?>
			<div id="<?php echo $admin_task["adminid"]; ?>" class="row-entry"><!-- Row entry for admin task -->
				<a href="edit.php?id=<?php echo $admin_task["adminid"]; ?>">
					<span class="admin-row-name"><?php if($admin_task["name"]!="") {echo $admin_task["name"];} else { echo "Name not entered"; } ?></span>
					<span class="admin-row-description"><?php if($admin_task["description"]!="") {echo $admin_task["description"];} else { echo "Description not entered"; } ?></span>
					<span class="admin-row-weighting"><?php echo $admin_task["weighting"]; ?></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function add_admin_task() {
?>
		<!-- Send form contents to add-form.php -->
		<form id="add-admin-task" class="form" method="post" action="add-form.php">
			<label class="form-label">Name: </label>
			<input name="name" class="form-field" type="text" size="50" value="" />
			<br />
			<br />
			<label class="form-label">Description: </label>
			<input name="description" class="form-field" type="text" size="50" value="" />
			<br />
			<br />
			<label class="form-label">Weighting: </label>		
			<select name="weighting" class="form-field">
				<?php for($counter = 1; $counter < 11; $counter++){ ?>
					<option><?php echo $counter; ?></option>
				<?php } ?>
				</select>
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
			<span class="checkbox"><input type="submit" value="Add Admin Task" /></span>
		</form>
<?php
		return;
	}
?>


<?php
	function edit_admin_task($adminid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new CMySQL();
		$admin_tasks = $sql_connection->get_data("SELECT * FROM admin_tasks WHERE adminid=".$adminid." ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($admin_tasks as $admin_task){
?>
			<!-- Send form contents to edit-form.php -->
			<form id="edit-admin-task" class="form" method="post" action="edit-form.php">
				<input type="hidden" name="adminid" value="<?php echo $admin_task["adminid"]; ?>" />
				<label class="form-label">Name: </label>
				<input name="name" class="form-field" type="text" size="50" value="<?php echo $admin_task["name"]; ?>" />
				<br />
				<br />
				<label class="form-label">Description: </label>
				<input name="description" class="form-field" type="text" size="50" value="<?php echo $admin_task["description"]; ?>" />
				<br />
				<br />
				<label class="form-label">Weighting: </label>		
				<select name="weighting" class="form-field">
				<?php for($counter = 1; $counter < 11; $counter++){ ?>
					<option<?php if($admin_task["weighting"] == $counter) { echo " selected=\"selected\""; } ?>><?php echo $counter; ?></option>
				<?php } ?>
				</select>
				<br />
				<br />
				<label class="form-label">Availability: </label>
				<span class="checkbox">
					<input type="checkbox" name="availability1" value="1"<?php if($admin_task["availability1"] == 1) echo " checked=\"checked\""; ?> />1st Semester&nbsp;
					<input type="checkbox" name="availability2" value="1"<?php if($admin_task["availability2"] == 1) echo " checked=\"checked\""; ?> />Christmas&nbsp;
					<input type="checkbox" name="availability3" value="1"<?php if($admin_task["availability3"] == 1) echo " checked=\"checked\""; ?> />2nd Semester&nbsp;
					<input type="checkbox" name="availability4" value="1"<?php if($admin_task["availability4"] == 1) echo " checked=\"checked\""; ?> />Easter&nbsp;
					<input type="checkbox" name="availability5" value="1"<?php if($admin_task["availability5"] == 1) echo " checked=\"checked\""; ?> />3rd Semester&nbsp;
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
	function remove_admin_task($adminid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new CMySQL();
		$sql_connection->add_query("DELETE FROM admin_tasks WHERE adminid = ".$adminid);
		$sql_connection->add_query("DELETE FROM admin_tasks_xref WHERE adminid = ".$adminid);
		$result = $sql_connection->query();
		return;
	}
?>


<?php
	function add_admin_task_xref($adminid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new CMySQL();
		$staff_members = $sql_connection->get_data("SELECT DISTINCT * FROM staff_members WHERE (staff_members.staffid) NOT IN ( SELECT admin_tasks_xref.staffid FROM admin_tasks_xref WHERE admin_tasks_xref.adminid = ".$adminid.") ORDER BY forename ASC");
		$all_percentages = $sql_connection->get_data("SELECT * FROM admin_tasks_xref WHERE admin_tasks_xref.adminid = ".$adminid);
		foreach($all_percentages as $all_percentage){
			$total_percentage += $all_percentage["percentage"];
		}

		if((count($staff_members) > 0) && ($total_percentage < 100)) {
?>
		<!-- Send form contents to add-form-xref.php -->
		<form id="add-admin-task-xref" class="form" method="post" action="add-form-xref.php?adminid=<?php echo $adminid; ?>">
			<input type="hidden" name="adminid" value="<?php echo $adminid; ?>" />
			<label class="form-label">Staff Member: </label>
			<select name="staffid" class="form-field">
<?php
				$i=0;
				$counter = 0;
				$current_letter='A';
				foreach($staff_members as $staff_member){
					if ($counter == 0)
					{
						$current_letter = substr($staff_member["forename"],0,1);
						echo '<optgroup class="listgroup" label="'.$current_letter.'">';
					}

					if (substr($staff_member["forename"],0,1) != $current_letter)
					{
						echo '</optgroup>';
						$current_letter = substr($staff_member["forename"],0,1);
						echo '<optgroup class="listgroup" label="'.$current_letter.'">';
					}
?>
					<option class="listcolor<?php echo $i; ?>" value="<?php echo $staff_member["staffid"]; ?>">
						<?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?>
						&nbsp;-&nbsp;
						<?php if($staff_member["email"]!="") {echo $staff_member["email"];} else { echo "E-Mail not entered"; } ?>
					</option>
					<?php $i = -($i - 1);
					$counter = $counter +1;
				}
?>
			</select>
			<br />
			<br />
			<label class="form-label">Percentage Taken: </label>		
			<select name="percentage" class="form-field">
			<?php for($counter = 1; $counter < 101; $counter++){ ?>
				<?php if ($counter == (101 - $total_percentage)) break; ?>
				<option><?php echo $counter; ?></option>
			<?php } ?>
			</select>
			<br />
			<br />
			<label class="form-label">&nbsp;</label>
			<span class="checkbox"><input type="submit" value="Assign Staff Member" /></span>
		</form>
<?php
		} else {
?>
			<div class="row-entry"><h3>Unable to assign any more staff members</h3></div>
<?php
		}
		return;
	}
?>


<?php
	function view_admin_task_xref($adminid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new CMySQL();
		$staff_members = $sql_connection->get_data("SELECT admin_tasks_xref.staffid, admin_tasks_xref.adminid, admin_tasks_xref.percentage, staff_members.staffid, staff_members.forename, staff_members.surname, staff_members.email FROM admin_tasks_xref, staff_members WHERE (admin_tasks_xref.adminid = \"".$adminid."\") AND (admin_tasks_xref.staffid = staff_members.staffid) ORDER BY forename ASC");
		
		/* Loop and display query results */
		$counter = 0;
		foreach($staff_members as $staff_member){
?>
			<div id="<?php echo $staff_member["staffid"]; ?>" class="row-entry"><!-- Row entry for assigned staff member -->
				
					<span class="staff-row-name"><?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?></span>
					<span class="staff-row-email"><?php if($staff_member["email"]!="") {echo $staff_member["email"];} else { echo "E-Mail not entered"; } ?></span>
					<span class="staff-row-workload"><?php echo $staff_member["percentage"]."&#37;" ?></span>
					<span class="row-link row-link-red"><a href="remove-xref.php?staffid=<?php echo $staff_member["staffid"]; ?>&adminid=<?php echo $adminid; ?>">Unassign</a></span>
				
			</div>
			<?php $counter = $counter +1;
		}
		if ($counter == 0) { echo '<div class="row-entry">No staff member currently assigned to this task.</div>'; }
		return;
	}
?>


<?php
	function remove_admin_task_xref($staffid,$adminid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new CMySQL();
		$sql_connection->add_query("DELETE FROM admin_tasks_xref WHERE (staffid = ".$staffid.") AND (adminid = ".$adminid.")");
		$result = $sql_connection->query();
		return;
	}
?>

<?php
        function get_admin_task_infos($adminid)
        {
                $sql_connection = new CMySQL();
                $infos = $sql_connection->get_data("SELECT * FROM admin_tasks WHERE adminid = ".$adminid.";");

                return $infos;
        }
?>

