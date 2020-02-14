<?php
	require_once('../../core/engine.php'); 
        include_once('../../core/protect.php');
?>


<?php
	function show_research_duties() {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$research_duties = $sql_connection->query_database("SELECT * FROM research_duties ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($research_duties as $research_duty){
?>
			<div id="<?php echo $research_duty["researchid"]; ?>" class="row-entry"><!-- Row entry research duty -->
				<a href="edit.php?id=<?php echo $research_duty["researchid"]; ?>">
					<span class="research-row-name"><?php if($research_duty["name"]!="") {echo $research_duty["name"];} else { echo "Name not entered"; } ?></span>
					<span class="research-row-type"><?php if($research_duty["researchtype"]!="") {echo $research_duty["researchtype"];} else { echo "Type not entered"; } ?></span>
					<span class="research-row-description"><?php if($research_duty["description"]!="") {echo $research_duty["description"];} else { echo "Description not entered"; } ?></span>
					<span class="research-row-weighting"><?php echo $research_duty["weighting"]; ?></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function show_research_duties_filtered($period) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$research_duties = $sql_connection->query_database("SELECT * FROM research_duties WHERE availability".$period." = 1 ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($research_duties as $research_duty){
?>
			<div id="<?php echo $research_duty["researchid"]; ?>" class="row-entry"><!-- Row entry research duty -->
				<a href="edit.php?id=<?php echo $research_duty["researchid"]; ?>">
					<span class="research-row-name"><?php if($research_duty["name"]!="") {echo $research_duty["name"];} else { echo "Name not entered"; } ?></span>
					<span class="research-row-type"><?php if($research_duty["researchtype"]!="") {echo $research_duty["researchtype"];} else { echo "Type not entered"; } ?></span>
					<span class="research-row-description"><?php if($research_duty["description"]!="") {echo $research_duty["description"];} else { echo "Description not entered"; } ?></span>
					<span class="research-row-weighting"><?php echo $research_duty["weighting"]; ?></span>
					<span class="row-link">More</span>
				</a>
			</div>
<?php
		}
		return;
	}
?>


<?php
	function add_research_duty() {
?>
		<!-- Send form contents to add-form.php -->
		<form id="add-research-duty" class="form" method="post" action="add-form.php">
			<label class="form-label">Duty Name: </label>
			<input name="name" class="form-field" type="text" size="50" value="" />
			<br />
			<br />
			<label class="form-label">Duty Type: </label>
			<input name="researchtype" class="form-field" type="text" size="50" value="" />
			<br />
			<br />
			<label class="form-label">Duty Description: </label>
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
			<span class="checkbox"><input type="submit" value="Add Research Duty" /></span>
		</form>
<?php

		return;
	}
?>


<?php
	function edit_research_duty($researchid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$research_duties = $sql_connection->query_database("SELECT * FROM research_duties WHERE researchid=".$researchid." ORDER BY name ASC");
		
		/* Loop and display query results */
		foreach($research_duties as $research_duty){
?>
			<!-- Send form contents to edit-form.php -->
			<form id="edit-research-duty" class="form" method="post" action="edit-form.php">
				<input type="hidden" name="researchid" value="<?php echo $research_duty["researchid"]; ?>" />
				<label class="form-label">Duty Name: </label>
				<input name="name" class="form-field" type="text" size="50" value="<?php echo $research_duty["name"]; ?>" />
				<br />
				<br />
				<label class="form-label">Duty Type: </label>
				<input name="researchtype" class="form-field" type="text" size="50" value="<?php echo $research_duty["researchtype"]; ?>" />
				<br />
				<br />
				<label class="form-label">Duty Description: </label>
				<input name="description" class="form-field" type="text" size="50" value="<?php echo $research_duty["description"]; ?>" />
				<br />
				<br />
				<label class="form-label">Weighting: </label>		
				<select name="weighting" class="form-field">
				<?php for($counter = 1; $counter < 11; $counter++){ ?>
					<option<?php if($research_duty["weighting"] == $counter) { echo " selected=\"selected\""; } ?>><?php echo $counter; ?></option>
				<?php } ?>
				</select>
				<br />
				<br />
				<label class="form-label">Availability: </label>
				<span class="checkbox">
					<input type="checkbox" name="availability1" value="1"<?php if($research_duty["availability1"] == 1) echo " checked=\"checked\""; ?> />1st Semester&nbsp;
					<input type="checkbox" name="availability2" value="1"<?php if($research_duty["availability2"] == 1) echo " checked=\"checked\""; ?> />Christmas&nbsp;
					<input type="checkbox" name="availability3" value="1"<?php if($research_duty["availability3"] == 1) echo " checked=\"checked\""; ?> />2nd Semester&nbsp;
					<input type="checkbox" name="availability4" value="1"<?php if($research_duty["availability4"] == 1) echo " checked=\"checked\""; ?> />Easter&nbsp;
					<input type="checkbox" name="availability5" value="1"<?php if($research_duty["availability5"] == 1) echo " checked=\"checked\""; ?> />3rd Semester&nbsp;
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
	function remove_research_duty($researchid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("DELETE FROM research_duties WHERE researchid = ".$researchid);
		$sql_connection->add_query("DELETE FROM research_duties_xref WHERE researchid = ".$researchid);
		$result = $sql_connection->query();
		return;
	}
?>


<?php
	function add_research_duty_xref($researchid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$staff_members = $sql_connection->query_database("SELECT DISTINCT * FROM staff_members WHERE (staff_members.staffid) NOT IN ( SELECT research_duties_xref.staffid FROM research_duties_xref WHERE research_duties_xref.researchid = ".$researchid.") ORDER BY forename ASC");
		$all_percentages = $sql_connection->query_database("SELECT * FROM research_duties_xref WHERE research_duties_xref.researchid = ".$researchid);
		foreach($all_percentages as $all_percentage){
			$total_percentage += $all_percentage["percentage"];
		}

		if((count($staff_members) > 0) && ($total_percentage < 100)) {
?>
		<!-- Send form contents to add-form-xref.php -->
		<form id="add-research_duty-xref" class="form" method="post" action="add-form-xref.php?researchid=<?php echo $researchid; ?>">
			<input type="hidden" name="researchid" value="<?php echo $researchid; ?>" />
			<label class="form-label">Staff Member: </label>
			<select name="staffid" class="form-field">
<?php
				foreach($staff_members as $staff_member){
?>
					<option value="<?php echo $staff_member["staffid"]; ?>">
						<?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?>
						&nbsp;-&nbsp;
						<?php if($staff_member["email"]!="") {echo $staff_member["email"];} else { echo "E-Mail not entered"; } ?>
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
	function view_research_duty_xref($researchid) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$staff_members = $sql_connection->query_database("SELECT research_duties_xref.staffid, research_duties_xref.researchid, research_duties_xref.percentage, staff_members.staffid, staff_members.forename, staff_members.surname, staff_members.email FROM research_duties_xref, staff_members WHERE (research_duties_xref.researchid = \"".$researchid."\") AND (research_duties_xref.staffid = staff_members.staffid) ORDER BY forename ASC");
		
		/* Loop and display query results */
		foreach($staff_members as $staff_member){
?>
			<div id="<?php echo $staff_member["staffid"]; ?>" class="row-entry"><!-- Row entry for assigned staff member -->
				
					<span class="staff-row-name"><?php if($staff_member["forename"]!="" && $staff_member["surname"]!="") {echo $staff_member["forename"]."&nbsp;".$staff_member["surname"];} else { echo "Full name not entered"; } ?></span>
					<span class="staff-row-email"><?php if($staff_member["email"]!="") {echo $staff_member["email"];} else { echo "E-Mail not entered"; } ?></span>
					<span class="staff-row-workload"><?php echo $staff_member["percentage"]."&#37;" ?></span>
					<span class="row-link row-link-red"><a href="remove-xref.php?staffid=<?php echo $staff_member["staffid"]; ?>&researchid=<?php echo $researchid; ?>">Unassign</a></span>
				
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

<?php
        function get_research_duty_infos($researchid)
        {
               	$sql_connection = new mySQLi_helper();
               	$infos = $sql_connection->query_database("SELECT * FROM research_duties WHERE researchid = ".$researchid.";");

                return $infos;
       	}
?>

