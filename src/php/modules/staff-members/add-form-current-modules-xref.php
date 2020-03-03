<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');
	
	/* If file is being called from form, insert new data into database */
	if($_POST){
		$sql_connection = new CMySQL();
		$sql_connection->add_query("INSERT INTO current_modules_xref VALUES ('".$_POST['staffid']."','".$_POST['moduleid']."','".$_POST['percentage']."');");
		$result = $sql_connection->query();
		
		/* Notify affected staff members */
		notify_module($_POST['staffid'],$_POST['moduleid'],"ASSIGNING:  ".$_POST['percentage']."% of ");
		
		if($result[0] != 1){
			echo "Error, " . $result[0];
		}else{
			/* On succesful transaction, attempt to redirect to main page */
			echo "
				<script language=javascript>
					setTimeout(\"location.href='edit.php?id=".$_GET["staffid"]."'\",[0]);
				</script>
				<noscript>
					Everything worked out great! <a href=\"edit.php?id=".$_GET["staffid"].">Click here to see the results.</a>
				</noscript>
			";
		}
	}
?>
