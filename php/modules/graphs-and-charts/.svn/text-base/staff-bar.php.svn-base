<?php
	// Standard inclusions   
	include("pChart/pChart/pData.class");
	include("pChart/pChart/pChart.class");

	if ((isset($_GET['staffid'])) && ($_GET['staffid'] != '')) {
		ob_start();
			include_once('controller.php');
			$staff_name = staff_name($_GET['staffid']);
			$module_percentage = module_percentage($_GET['staffid']);
			$admin_percentage = admin_percentage($_GET['staffid']);
			$research_percentage = research_percentage($_GET['staffid']);
			$total_percentage = total_percentage($_GET['staffid']);
		ob_end_clean();
		
		// Dataset definition 
		$DataSet = new pData;
		$DataSet->AddPoint(($module_percentage/$total_percentage*100),"Current Modules");
		$DataSet->AddPoint(($admin_percentage/$total_percentage*100),"Admin Tasks");
		$DataSet->AddPoint(($research_percentage/$total_percentage*100),"Research Modules");
		$DataSet->AddAllSeries();
		$DataSet->SetYAxisUnit("%");
		
		// Initialise the graph
		$Test = new pChart(20,165);
		$Test->setFontProperties("pChart/Fonts/tahoma.ttf",8);
		$Test->setGraphArea(0,0,20,160);
		$Test->drawGraphArea(255,255,255,FALSE);
		$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_ADDALLSTART0,255,255,255,FALSE,0,2,TRUE);
		
		// Draw the bar graph
		$Test->loadColorPalette('pChart/tones.txt');
		$Test->drawStackedBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),100);
		
		// Finish the graph
		$Test->Stroke();
	}
?>
