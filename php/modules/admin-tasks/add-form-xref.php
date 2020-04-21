<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');

	/* If file is being called from form, insert new data into database */
	if($_POST){
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("INSERT INTO StaffTasks (StaffID, TaskID, WorkloadPercentage) VALUES ('".$_POST['staffid']."','".$_POST['adminid']."','".$_POST['percentage']."');");
		$result = $sql_connection->query();

		/* Notify affected staff members */
		notify_task($_POST['staffid'],$_POST['adminid'],"ASSIGNING:  ".$_POST['percentage']."% of ");

		if($result[0] != 1){
			echo "Error, " . $result[0];
		}else{
			/* On succesful transaction, attempt to redirect to main page */
			echo "
				<script language=javascript>
					setTimeout(\"location.href='edit.php?id=".$_GET["adminid"]."'\",[0]);
				</script>
				<noscript>
					Everything worked out great! <a href=\"edit.php?id=".$_GET["adminid"].">Click here to see the results.</a>
				</noscript>
			";
		}
	}
?>
