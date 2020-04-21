<?php
 /*
     Example8 : A radar graph
 */

	// Standard inclusions 
	include_once("pChart/pChart/pData.class");
	include_once("pChart/pChart/pChart.class");
        include_once('../../core/protect.php');

	ob_start();
		include_once('controller.php');
		$staff_name = staff_name($_GET['staffid']);
		$module_count = module_count($_GET['staffid']);
		$admin_count = admin_count($_GET['staffid']);
		$research_count = research_count($_GET['staffid']);
	ob_end_clean();

	// Dataset definition 
	$DataSet = new pData;
	$DataSet->AddPoint(array("Current Modules","Admin Tasks","Research Duties"),"Label");
	$DataSet->AddPoint(array($module_count,$admin_count,$research_count),"Serie1");
	$DataSet->AddSerie("Serie1");
	$DataSet->SetAbsciseLabelSerie("Label");
	 $DataSet->SetSerieName("$staff_name","Serie1");
	 // Initialise the graph
	$Test = new pChart(600,600);
	$Test->setFontProperties("pChart/Fonts/tahoma.ttf",8);
	$Test->drawFilledRoundedRectangle(7,7,483,393,5,240,240,240);
	$Test->drawRoundedRectangle(5,5,485,395,5,230,230,230);
	$Test->setGraphArea(120,60,370,370);
	$Test->drawFilledRoundedRectangle(30,30,460,370,5,254,254,254);
	$Test->drawRoundedRectangle(30,30,460,370,5,220,220,220);
	 // Draw the radar graph
	$Test->drawRadarAxis($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE,20,120,120,120,230,230,230);
	$Test->drawFilledRadar($DataSet->GetData(),$DataSet->GetDataDescription(),50,20);

	// Finish the graph
	$Test->drawLegend(35,35,$DataSet->GetDataDescription(),254,254,254);
	$Test->setFontProperties("pChart/Fonts/tahoma.ttf",10);
	$Test->drawTitle(60,22,"$staff_name",50,50,50,400);
	//$Test->Render("playing.png");
	$Test->Stroke();
?>
