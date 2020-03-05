<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');
?>


<?php
	function staff_name($staffid) {
		/* Instantiate mysql class */
		$sql_connection = new mySQLi_helper();
		
		/* Write query between brackets */
		$staff_members = $sql_connection->query_database("SELECT staff_members.forename, staff_members.surname FROM staff_members WHERE staffid = ".$staffid);
		
		/* Execute query */
		$result = $sql_connection->query();
		
		/* Return count of query result */
		
		$staff_member = $staff_members[0];

		return $staff_member["forename"]." ".$staff_member["surname"];
	}

	function module_count($staffid) {
		/* Instantiate mysql class */
		$sql_connection = new mySQLi_helper();
		
		/* Write query between brackets */
		$staff_members = $sql_connection->query_database("SELECT * FROM current_modules_xref WHERE staffid = ".$staffid);
		
		/* Execute query */
		$result = $sql_connection->query();
		
		/* Return count of query result */
		return COUNT($staff_members);
	}

	function admin_count($staffid) {
		/* Instantiate mysql class */
		$sql_connection = new mySQLi_helper();
		
		/* Write query between brackets */
		$staff_members = $sql_connection->query_database("SELECT * FROM admin_tasks_xref WHERE staffid = ".$staffid);
		
		/* Execute query */
		$result = $sql_connection->query();
		
		/* Return count of query result */
		return COUNT($staff_members);
	}

	function research_count($staffid) {
		/* Instantiate mysql class */
		$sql_connection = new mySQLi_helper();
		
		/* Write query between brackets */
		$staff_members = $sql_connection->query_database("SELECT * FROM research_duties_xref WHERE staffid = ".$staffid);
		
		/* Execute query */
		$result = $sql_connection->query();
		
		/* Return count of query result */
		return COUNT($staff_members);
	}

	function total_count($staffid) {
		$total_count = 0;

		$total_count = module_count($staffid) + admin_count($staffid) + research_count($staffid);

		return $total_count;
	}

	function module_percentage($staffid) {
		/* Instantiate mysql class */
		$sql_connection = new mySQLi_helper();

		$total_percentage = 0;
		
		/* Write query between brackets */
		$current_modules = $sql_connection->query_database("SELECT * FROM current_modules_xref WHERE staffid = ".$staffid);
		
		/* Loop and display query results */
		foreach($current_modules as $current_module){

			$total_percentage = $total_percentage + $current_module["percentage"];

		}
		
		/* Return count of query result */
		return $total_percentage;
	}

	function admin_percentage($staffid) {
		/* Instantiate mysql class */
		$sql_connection = new mySQLi_helper();
		
		$total_percentage = 0;
		
		/* Write query between brackets */
		$admin_tasks = $sql_connection->query_database("SELECT * FROM admin_tasks_xref WHERE staffid = ".$staffid);
		
		/* Loop and display query results */
		foreach($admin_tasks as $admin_task){

			$total_percentage = $total_percentage + $admin_task["percentage"];

		}
		
		/* Return count of query result */
		return $total_percentage;
	}

	function research_percentage($staffid) {
		/* Instantiate mysql class */
		$sql_connection = new mySQLi_helper();
		
		$total_percentage = 0;
		
		/* Write query between brackets */
		$research_duties = $sql_connection->query_database("SELECT * FROM research_duties_xref WHERE staffid = ".$staffid);
		
		/* Loop and display query results */
		foreach($research_duties as $research_duty){

			$total_percentage = $total_percentage + $research_duty["percentage"];

		}
		
		/* Return count of query result */
		return $total_percentage;
	}

	function total_percentage($staffid) {
		$total_percentage = 0;

		$total_percentage = module_percentage($staffid) + admin_percentage($staffid) + research_percentage($staffid);

		return $total_percentage;
	}
?>
