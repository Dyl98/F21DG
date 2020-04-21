<?php
	session_start();

        include_once('../../core/protect.php');

	require_once('../../core/engine.php');

	/* If file is being called from form, insert new data into database */
	if($_POST){
		//TODO this can be generalised alongside the HTML form in add_admin_task in controller.php
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("INSERT INTO Tasks (Name, Description, WorkUnits, Classification) VALUES ('".strip_tags($_POST['name'])."','".strip_tags($_POST['description'])."','".$_POST['workUnits']."', 3);" //,'".$_POST['availability1']."','".$_POST['availability2']."','".$_POST['availability3']."','".$_POST['availability4']."','".$_POST['availability5']."');");
		//TODO Insert date details into DB once the UI is updated to provide it
		$result = $sql_connection->query();

		if($result[0] != 1){
			echo "Error, " . $result[0];
		}else{
			/* On succesful transaction, attempt to redirect to main page */
			echo "
				<script language=javascript>
					setTimeout(\"location.href='../admin-tasks/'\",[0]);
				</script>
				<noscript>
					Everything worked out great! <a href=\"../admin-tasks/\">Click here to see the results.</a>
				</noscript>
			";
		}
	}
?>
