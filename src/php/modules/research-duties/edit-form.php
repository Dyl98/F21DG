<?php
	require_once('../../core/engine.php');
        include_once('../../core/protect.php');
	
	/* If file is being called from form, update data in database */
	if($_POST){
		$sql_connection = new CMySQL();
		$sql_connection->add_query("UPDATE research_duties SET name = \"".strip_tags($_POST['name'])."\", researchtype = \"".strip_tags($_POST['researchtype'])."\", description = \"".strip_tags($_POST['description'])."\", weighting = \"".$_POST['weighting']."\", availability1 = \"".$_POST['availability1']."\", availability2 = \"".$_POST['availability2']."\", availability3 = \"".$_POST['availability3']."\", availability4 = \"".$_POST['availability4']."\", availability5 = \"".$_POST['availability5']."\" WHERE researchid = ".$_POST['researchid']);
		$result = $sql_connection->query();
		
		if($result[0] != 1){
			echo "Error, " . $result[0];
		}else{
			/* On succesful transaction, attempt to redirect to main page */
			echo "
				<script language=javascript>
					setTimeout(\"location.href='../research-duties/'\",[0]);
				</script>
				<noscript>
					Everything worked out great! <a href=\"../research-duties/\">Click here to see the results.</a>
				</noscript>
			";
		}
	}
?>