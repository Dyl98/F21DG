<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');
?>


<?php
	function show_current_modules() {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$current_modules = $sql_connection->query_database("SELECT * FROM current_modules ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($current_modules as $current_module){
?>
			<div id="<?php echo $current_module["moduleid"]; ?>" class="row-entry"><!-- Row entry for module -->
				<a href="edit.php?id=<?php echo $current_module["moduleid"]; ?>">
					<span class="module-row-code"><?php if($current_module["code"]!="") {echo $current_module["code"];} else { echo "Code not entered"; } ?></span>
					<span class="module-row-name"><?php if($current_module["name"]!="") {echo $current_module["name"];} else { echo "Module name not entered"; } ?></span>
					<span class="module-row-weighting"><?php echo $current_module["weighting"]; ?></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function show_current_modules_filtered($period) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$current_modules = $sql_connection->query_database("SELECT * FROM current_modules WHERE availability".$period." = 1 ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($current_modules as $current_module){
?>
			<div id="<?php echo $current_module["moduleid"]; ?>" class="row-entry"><!-- Row entry for module -->
				<a href="edit.php?id=<?php echo $current_module["moduleid"]; ?>">
					<span class="module-row-code"><?php if($current_module["code"]!="") {echo $current_module["code"];} else { echo "Code not entered"; } ?></span>
					<span class="module-row-name"><?php if($current_module["name"]!="") {echo $current_module["name"];} else { echo "Module name not entered"; } ?></span>
					<span class="module-row-weighting"><?php echo $current_module["weighting"]; ?></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function add_module() {
?>
		<!-- Send form contents to add-form.php -->
		<form id="add-module" class="form" method="post" action="add-form.php">
			<label class="form-label">Module Code: </label>
			<input name="code" class="form-field" type="text" size="50" value="" />
			<br />
			<br />
			<label class="form-label">Module Name: </label>
			<input name="name" class="form-field" type="text" size="50" value="" />
			<br />
			<br />
			<label class="form-label">Descriptor Link: </label>		
			<input name="descriptor" class="form-field" type="text" size="50" value="" />
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
			<span class="checkbox"><input type="submit" value="Add Module" /></span>
		</form>
<?php
		return;
	}
?>


<?php
	function edit_module($moduleid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$current_modules = $sql_connection->query_database("SELECT * FROM current_modules WHERE moduleid=".$moduleid." ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($current_modules as $current_module){
?>
			<!-- Send form contents to edit-form.php -->
			<form id="edit-module" class="form" method="post" action="edit-form.php?moduleid=<?php echo $moduleid; ?>">
				<input type="hidden" name="moduleid" value="<?php echo $current_module["moduleid"]; ?>" />
				<label class="form-label">Module Code: </label>
				<input name="code" class="form-field" type="text" size="50" value="<?php echo $current_module["code"]; ?>" />
				<br />
				<br />
				<label class="form-label">Module Name: </label>
				<input name="name" class="form-field" type="text" size="50" value="<?php echo $current_module["name"]; ?>" />
				<br />
				<br />
				<label class="form-label">Descriptor Link: </label>		
				<input name="descriptor" class="form-field" type="text" size="50" value="<?php echo $current_module["descriptor"]; ?>" />
				<br />
				<br />
				<label class="form-label">Weighting: </label>		
				<select name="weighting" class="form-field">
				<?php for($counter = 1; $counter < 11; $counter++){ ?>
					<option<?php if($current_module["weighting"] == $counter) { echo " selected=\"selected\""; } ?>><?php echo $counter; ?></option>
				<?php } ?>
				</select>
				<br />
				<br />
				<label class="form-label">Availability: </label>
				<span class="checkbox">
					<input type="checkbox" name="availability1" value="1"<?php if($current_module["availability1"] == 1) echo " checked=\"checked\""; ?> />1st Semester&nbsp;
					<input type="checkbox" name="availability2" value="1"<?php if($current_module["availability2"] == 1) echo " checked=\"checked\""; ?> />Christmas&nbsp;
					<input type="checkbox" name="availability3" value="1"<?php if($current_module["availability3"] == 1) echo " checked=\"checked\""; ?> />2nd Semester&nbsp;
					<input type="checkbox" name="availability4" value="1"<?php if($current_module["availability4"] == 1) echo " checked=\"checked\""; ?> />Easter&nbsp;
					<input type="checkbox" name="availability5" value="1"<?php if($current_module["availability5"] == 1) echo " checked=\"checked\""; ?> />3rd Semester&nbsp;
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
	function remove_module($moduleid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("DELETE FROM current_modules WHERE moduleid = ".$moduleid);
		$sql_connection->add_query("DELETE FROM current_modules_xref WHERE moduleid = ".$moduleid);
		$result = $sql_connection->query();
		return;
	}
?>


<?php
	function add_module_xref($moduleid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$staff_members = $sql_connection->query_database("SELECT DISTINCT * FROM staff_members WHERE (staff_members.staffid) NOT IN ( SELECT current_modules_xref.staffid FROM current_modules_xref WHERE current_modules_xref.moduleid = ".$moduleid.") ORDER BY forename ASC");
		$all_percentages = $sql_connection->query_database("SELECT * FROM current_modules_xref WHERE current_modules_xref.moduleid = ".$moduleid);
		foreach($all_percentages as $all_percentage){
			$total_percentage += $all_percentage["percentage"];
		}

		if((count($staff_members) > 0) && ($total_percentage < 100)) {
?>
		<!-- Send form contents to add-form-xref.php -->
		<form id="add-module-xref" class="form" method="post" action="add-form-xref.php?moduleid=<?php echo $moduleid; ?>">
			<input type="hidden" name="moduleid" value="<?php echo $moduleid; ?>" />
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
						&nbsp;&nbsp;&nbsp;&nbsp;<?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?>
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
	function view_module_xref($moduleid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$staff_members = $sql_connection->query_database("SELECT current_modules_xref.staffid, current_modules_xref.moduleid, current_modules_xref.percentage, staff_members.staffid, staff_members.forename, staff_members.surname, staff_members.email FROM current_modules_xref, staff_members WHERE (current_modules_xref.moduleid = \"".$moduleid."\") AND (current_modules_xref.staffid = staff_members.staffid) ORDER BY forename ASC");
		
		/* Loop and display query results */
		$counter = 0;
		foreach($staff_members as $staff_member){
?>
			<div id="<?php echo $staff_member["staffid"]; ?>" class="row-entry"><!-- Row entry for assigned staff member -->
				
					<span class="staff-row-name"><?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?></span>
					<span class="staff-row-email"><?php if($staff_member["email"]!="") {echo $staff_member["email"];} else { echo "E-Mail not entered"; } ?></span>
					<span class="staff-row-workload"><?php echo $staff_member["percentage"]."&#37;" ?></span>
					<span class="row-link row-link-red"><a href="remove-xref.php?staffid=<?php echo $staff_member["staffid"]; ?>&moduleid=<?php echo $moduleid; ?>">Unassign</a></span>
				
			</div>
			<?php $counter = $counter +1;
		}
		if ($counter == 0) { echo '<div class="row-entry">No staff member currently assigned to this module.</div>'; }
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
     	function get_current_module_infos($moduleid)
        {
               	$sql_connection = new mySQLi_helper();
               	$infos = $sql_connection->query_database("SELECT * FROM current_modules WHERE moduleid = ".$moduleid.";");

                return $infos;
       	}
?>

