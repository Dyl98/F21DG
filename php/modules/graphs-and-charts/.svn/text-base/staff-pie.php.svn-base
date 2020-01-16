<?php
	include_once("pChart/pChart/pData.class");
	include_once("pChart/pChart/pChart.class");
	include_once('../../core/protect.php');

	if ((isset($_GET['staffid'])) && ($_GET['staffid'] != '')) {
		
		ob_start();
			include_once('staff-pie-controller.php');
			$staff_name = staff_name($_GET['staffid']);
			$module_percentage = module_percentage($_GET['staffid']);
			$admin_percentage = admin_percentage($_GET['staffid']);
			$research_percentage = research_percentage($_GET['staffid']);
		ob_end_clean();

		if((($admin_percentage == '') || ($admin_percentage == 0)) && (($module_percentage == '') || ($module_percentage == 0)) &&  (($research_percentage == '') || ($research_percentage == 0))) {
			break;
		}

		// Dataset definition 
		$DataSet = new pData;
		$DataSet->AddPoint(array($module_percentage,$admin_percentage,$research_percentage),"Serie1");
		$DataSet->AddPoint(array("Modules","Admin. Tasks","Research"),"Serie2");
		$DataSet->AddAllSeries();
		$DataSet->SetAbsciseLabelSerie("Serie2");
		
		// Initialise the graph
		$Test = new pChart(420,250);
		$Test->drawFilledRoundedRectangle(7,7,413,243,5,240,240,240);
		$Test->drawRoundedRectangle(5,5,415,245,5,230,230,230);
		$Test->loadColorPalette('pChart/tones.txt');
		
		// Draw the pie chart
		$Test->setFontProperties("pChart/Fonts/tahoma.ttf",8);
		$Test->AntialiasQuality = 0;
		$Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),180,130,110,PIE_PERCENTAGE_LABEL,FALSE,50,20,3);
		$Test->drawPieLegend(310,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);
		
		// Write the title
		$Test->setFontProperties("pChart/Fonts/MankSans.ttf",10);
		$Test->drawTitle(10,20,"",100,100,100);
		
		$Test->Stroke();
	}
?>
