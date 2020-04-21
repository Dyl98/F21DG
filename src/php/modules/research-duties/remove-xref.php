<?php 
	require_once('controller.php');
        include_once('../../core/protect.php');
	
	/* Call function from controller.php and pass id variable */
	remove_research_duty_xref($_GET["staffid"],$_GET["researchid"]);
	
	/* Notify affected staff members */
	notify_duty($_GET['staffid'],$_GET['researchid'],"UNASSIGNING:  ");
	
	/* On succesful transaction, attempt to redirect to main page */
	echo "
		<script language=javascript>
			setTimeout(\"location.href='edit.php?id=".$_GET["researchid"]."'\",[0]);
		</script>
		<noscript>
			Everything worked out great! <a href=\"edit.php?id=".$_GET["researchid"].">Click here to see the results.</a>
		</noscript>
	";
?>
