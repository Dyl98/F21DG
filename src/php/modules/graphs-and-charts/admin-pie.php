<?php
	include_once("pChart/pChart/pData.class");
	include_once("pChart/pChart/pChart.class");
	include_once('../../core/protect.php');

	if ((isset($_GET['data'])) && ($_GET['data'] != '')) {
		ob_start();
			include_once('../../core/engine.php');

			// $params --> <module_id>:<staff_id_01>:<percentage_01>:<staff_id_02>:<percentage_02>: ... :<staff_id_N>:<percentage_N>
			$params = explode(":",$_GET['data']);		

			$staff_names = array();
			$staff_percentages = array();

			$counter = 0;
			foreach ($params as $param)
			{
				if ($counter > 0)
				{
					if ($counter % 2) // even number --> staff_id
					{
						$infos = get_staff_info($param);
						array_push($staff_names,$infos[0]['forename'].' '.$infos[0]['surname']);
					}
					else	// odd number --> percentage
					{
						array_push($staff_percentages,$param);
					}
				}
				$counter++;
			}
			unset($param);
		ob_end_clean();
		
		// Dataset definition 
		$DataSet = new pData;
		$DataSet->AddPoint($staff_percentages,"Serie1");
		$DataSet->AddPoint($staff_names,"Serie2");
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
