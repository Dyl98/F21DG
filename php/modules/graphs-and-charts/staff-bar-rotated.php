<?php
	include_once('../../core/protect.php');
	require_once('../../core/config.php');

	// File and rotation
	$filename = $_SESSION['root_url'].'php/modules/graphs-and-charts/staff-bar.php?staffid='.$_GET['staffid'];
	$degrees = 270;
	
	// Content type
	header('Content-type: image/png');
	
	// Load
	$source = imagecreatefrompng($filename);
	
	// Rotate
	$rotate = imagerotate($source, $degrees, 0);
	
	// Output
	imagepng($rotate);
?>
