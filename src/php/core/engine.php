<?php
	require_once('mysql.php');
	require_once('config.php');
?>


<?php
	function get_staff_info($staffid) {
		$sql_connection = new mySQLi_helper();
		$staff_info = $sql_connection->query_database("SELECT * FROM Staff WHERE StaffID = ".$staffid.";");
		return $staff_info;
	}
?>

<?php //This gets the details of teaching tasks (and only teaching tasks)
	function get_modules_by_staff($staffid) {
		$sql_connection = new mySQLi_helper();
		$modules_by_staff = $sql_connection->query_database("SELECT DISTINCT * FROM Tasks AS T, StaffTasks AS ST, CourseDetails AS CD WHERE T.TaskID = ST.TaskID AND T.TaskID = CD.TaskID AND ST.StaffID = '".$staffid."';");
		return $modules_by_staff;
	}
?>

<?php //This gets the list of all tasks EXCEPT for teaching and research tasks
	function get_tasks_by_staff($staffid) {
		$sql_connection = new mySQLi_helper();
		$tasks_by_staff = $sql_connection->query_database("SELECT DISTINCT * FROM Tasks AS T, StaffTasks AS ST WHERE T.TaskID = ST.TaskID AND ST.StaffID = '".$staffid."' AND NOT EXISTS (SELECT TaskID FROM CourseDetails WHERE TaskID = ST.TaskID) AND NOT EXISTS (SELECT TaskID FROM ResearchDetails where TaskID = ST.TaskID);");
		return $tasks_by_staff;
	}
?>

<?php	// This gets the details of research tasks (and only research tasks)
	function get_duties_by_staff($staffid) {
		$sql_connection = new mySQLi_helper();
		$duties_by_staff = $sql_connection->query_database("SELECT DISTINCT * FROM Tasks AS T, StaffTasks AS ST, ResearchDetails AS RD WHERE T.TaskID = ST.TaskID AND T.TaskID = RD.TaskID AND ST.StaffID = '".$staffid."';");
		return $duties_by_staff;
	}
?>

<?php	//This gets the details of staff assigned to a given task (of any type)
	function get_staff_by_task($taskid) {
		$sql_connection = new mySQLi_helper();
		$staff_by_task = $sql_connection->query_database("SELECT DISTINCT * FROM Staff, StaffTasks WHERE Staff.StaffID = StaffTasks.StaffID AND StaffTasks.TaskID = '".$taskid."' ORDER BY Forename ASC;");
		return $staff_by_task;
	}
?>

<?php	//This gets the details of a teaching task with given TaskID
	function get_module_info($moduleid) {
		$sql_connection = new mySQLi_helper();
		$module_info = $sql_connection->query_database("SELECT * FROM Tasks, CourseDetails WHERE Tasks.TaskID = '".$moduleid."' AND Tasks.TaskID = CourseDetails.TaskID;");
		return $module_info;
	}
?>

<?php
	function get_staff_by_module($moduleid) {
		return get_staff_by_task($moduleid);
	}
?>


<?php
	function get_admin_info($adminid) {
		$sql_connection = new mySQLi_helper();
		$admin_info = $sql_connection->query_database("SELECT * FROM Tasks WHERE TaskID = '".$adminid."' ORDER BY Name ASC;");
		return $admin_info;
	}
?>

<?php
	function get_staff_by_admin($adminid) {
		return get_staff_by_task($adminid);
	}
?>


<?php
	function get_research_info($researchid) {
		$sql_connection = new mySQLi_helper();
		$research_info = $sql_connection->query_database("SELECT * FROM Tasks, ResearchDetails AS RD WHERE Tasks.TaskID = RD.TaskID AND Tasks.TaskID = ".$researchid.";");
		return $research_info;
	}
?>

<?php
	function get_staff_by_research($researchid) {
		return get_staff_by_task($researchid);
	}
?>

<?php
	function delete_task($taskID) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("DELETE FROM Tasks WHERE TaskID = ".$taskID);
		$result = $sql_connection->query();
		return;
}

	function delete_staff_assignment($staffID,$taskID) {
		/* Instantiate mysql class and execute sql query */
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("DELETE FROM StaffTasks WHERE StaffID = '".$staffID."' AND TaskID = '".$taskID."';");
		$result = $sql_connection->query();
		return;
	}
?>

<?php //TODO get this email malarky working with new database
	function notify_module($staffid,$moduleid,$assign){
		if ($_SESSION['mailSysBlocked'] == "False")
		{
			$staff = get_staff_info($staffid);
			$module = get_module_info($moduleid);
			$staff_by_module = get_staff_by_module($moduleid);

			$staff_list = "";
			foreach($staff_by_module as $staff_single) {
				$staff_list .= $staff_single['forename']." ".$staff_single['surname']." - ".$staff_single['email']."\n";
			};

			$from = "CS Management System"."<csmanagementsystem@hw.ac.uk>";
			$to = $staff[0]['forename']." ".$staff[0]['surname']."<".$staff[0]['email'].">";

			$subject = "CS Management System - Notice of Changes";
			$body = "Changes to your task allocations have been made by the CS Management System.\n\nThe following change has been made:\n".$assign.$module[0]['code']." - ".$module[0]['name']."\n\n"."The following staff members are currently assigned to this module:\n".$staff_list;

			$headers = 'From: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();

			mail($to, $subject, $body, $headers);
		}
	}
?>

<?php
	function notify_task($staffid,$adminid,$assign){
		if ($_SESSION['mailSysBlocked'] == "False")
		{
			$staff = get_staff_info($staffid);
			$task = get_admin_info($adminid);
			$staff_by_admin = get_staff_by_admin($adminid);

			$staff_list = "";
			foreach($staff_by_admin as $staff_single) {
				$staff_list .= $staff_single['forename']." ".$staff_single['surname']." - ".$staff_single['email']."\n";
			};

			$from = "CS Management System"."<csmanagementsystem@hw.ac.uk>";
			$to = $staff[0]['forename']." ".$staff[0]['surname']."<".$staff[0]['email'].">";

			$subject = "CS Management System - Notice of Changes";
			$body = "Changes to your task allocations have been made by the CS Management System.\n\nThe following change has been made:\n".$assign.$task[0]['name']."\n\n"."The following staff members are currently assigned to this admin task:\n".$staff_list;

			$headers = 'From: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();

			mail($to, $subject, $body, $headers);
		}
	}
?>

<?php
	function notify_duty($staffid,$researchid,$assign){
		if ($_SESSION['mailSysBlocked'] == "False")
		{
			$staff = get_staff_info($staffid);
			$duty = get_research_info($researchid);
			$staff_by_research = get_staff_by_research($researchid);

			$staff_list = "";
			foreach($staff_by_research as $staff_single) {
				$staff_list .= $staff_single['forename']." ".$staff_single['surname']." - ".$staff_single['email']."\n";
			};

			$from = "CS Management System"."<csmanagementsystem@hw.ac.uk>";
			$to = $staff[0]['forename']." ".$staff[0]['surname']."<".$staff[0]['email'].">";

			$subject = "CS Management System - Notice of Changes";
			$body = "Changes to your task allocations have been made by the CS Management System.\n\nThe following change has been made:\n".$assign.$duty[0]['name']."\n\n"."The following staff members are currently assigned to this research duty:\n".$staff_list;

			$headers = 'From: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();

			mail($to, $subject, $body, $headers);
		}
	}
?>
