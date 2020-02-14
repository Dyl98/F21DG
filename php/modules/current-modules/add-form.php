<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');
	
	/* If file is being called from form, insert new data into database */
	if($_POST){
		$sql_connection = new mySQLi_helper();
		$sql_connection->add_query("INSERT INTO current_modules VALUES ('','".strip_tags($_POST['code'])."','".strip_tags($_POST['name'])."','".strip_tags($_POST['descriptor'])."','".$_POST['weighting']."','".$_POST['availability1']."','".$_POST['availability2']."','".$_POST['availability3']."','".$_POST['availability4']."','".$_POST['availability5']."');");
		$result = $sql_connection->query();
		
		if($result[0] != 1){
			echo "Error, " . $result[0];
		}else{
			/* On succesful transaction, attempt to redirect to main page */
			echo "
				<script language=javascript>
					setTimeout(\"location.href='../current-modules/'\",[0]);
				</script>
				<noscript>
					Everything worked out great! <a href=\"../current-modules/\">Click here to see the results.</a>
				</noscript>
			";
		}
	}
?>
