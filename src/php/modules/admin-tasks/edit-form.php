<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');

	/* If file is being called from form, update data in database */
	if($_POST){
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("UPDATE Tasks SET Name = \"".strip_tags($_POST['name'])."\", Description = \"".strip_tags($_POST['description'])."\", workUnits = \"".$_POST['workUnits']."\", availability1 = \"".$_POST['availability1']."\", availability2 = \"".$_POST['availability2']."\", availability3 = \"".$_POST['availability3']."\", availability4 = \"".$_POST['availability4']."\", availability5 = \"".$_POST['availability5']."\" WHERE TaskID = ".$_POST['TaskID']);
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
