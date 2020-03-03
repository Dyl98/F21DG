<?php
	require_once('mysql.php');
	require_once('config.php');
?>


<?php
	function get_staff_info($staffid) {
		$sql_connection = new CMySQL();
		$staff_info = $sql_connection->get_data("SELECT * FROM staff_members WHERE staffid = ".$staffid.";");
		
		return $staff_info;
	}
?>

<?php
	function get_modules_by_staff($staffid) {
		$sql_connection = new CMySQL();
		$modules_by_staff = $sql_connection->get_data("SELECT DISTINCT * FROM current_modules, current_modules_xref WHERE current_modules.moduleid = current_modules_xref.moduleid AND current_modules_xref.staffid = '".$staffid."';");
		
		return $modules_by_staff;
	}
?>

<?php
	function get_tasks_by_staff($staffid) {
		$sql_connection = new CMySQL();
		$tasks_by_staff = $sql_connection->get_data("SELECT DISTINCT * FROM admin_tasks, admin_tasks_xref WHERE admin_tasks.adminid = admin_tasks_xref.adminid AND admin_tasks_xref.staffid = '".$staffid."';");
		
		return $tasks_by_staff;
	}
?>

<?php
	function get_duties_by_staff($staffid) {
		$sql_connection = new CMySQL();
		$duties_by_staff = $sql_connection->get_data("SELECT DISTINCT * FROM research_duties, research_duties_xref WHERE research_duties.researchid = research_duties_xref.researchid AND research_duties_xref.staffid = '".$staffid."';");
		
		return $duties_by_staff;
	}
?>


<?php
	function get_module_info($moduleid) {
		$sql_connection = new CMySQL();
		$module_info = $sql_connection->get_data("SELECT * FROM current_modules WHERE moduleid = ".$moduleid.";");
		
		return $module_info;
	}
?>

<?php
	function get_staff_by_module($moduleid) {
		$sql_connection = new CMySQL();
		$staff_by_module = $sql_connection->get_data("SELECT DISTINCT * FROM staff_members, current_modules_xref WHERE staff_members.staffid = current_modules_xref.staffid AND current_modules_xref.moduleid = '".$moduleid."';");
		
		return $staff_by_module;
	}
?>


<?php
	function get_admin_info($adminid) {
		$sql_connection = new CMySQL();
		$admin_info = $sql_connection->get_data("SELECT * FROM admin_tasks WHERE adminid = ".$adminid.";");
		
		return $admin_info;
	}
?>

<?php
	function get_staff_by_admin($adminid) {
		$sql_connection = new CMySQL();
		$staff_by_admin = $sql_connection->get_data("SELECT DISTINCT * FROM staff_members, admin_tasks_xref WHERE staff_members.staffid = admin_tasks_xref.staffid AND admin_tasks_xref.adminid = '".$adminid."';");
		
		return $staff_by_admin;
	}
?>


<?php
	function get_research_info($researchid) {
		$sql_connection = new CMySQL();
		$research_info = $sql_connection->get_data("SELECT * FROM research_duties WHERE researchid = ".$researchid.";");
		
		return $research_info;
	}
?>

<?php
	function get_staff_by_research($researchid) {
		$sql_connection = new CMySQL();
		$staff_by_research = $sql_connection->get_data("SELECT DISTINCT * FROM staff_members, research_duties_xref WHERE staff_members.staffid = research_duties_xref.staffid AND research_duties_xref.researchid = '".$researchid."';");
		
		return $staff_by_research;
	}
?>


<?php
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
