<?php
/*
        Unauthorized access protection script 
        (to be included in each browsable page of the
        website)
*/

	session_start();

	/* retrieve configuration variables */
	include_once("config.php");
/*
        If session's variable connect isn't initialized or is equal
        to 0 (unconnected) the user is being redirected to the login
        page
*/


	if ((!isset($_SESSION['connected'])) || ($_SESSION['connected']==0))
	{
   		// get curent directory structure eg "/top/second/third"
    		$without_args = explode('?',$_SERVER['REQUEST_URI'],2);
    		$current_directory = dirname($without_args[0]);
    	
		// place each directory into array and extracting the second value
    		$dir = array_slice(explode('/', $current_directory),1);


		// getting the root folder (the one just before the 'php' one)
        	$rootFolderName = '';
        	foreach ($dir as $key => $folder)
        	{
			if ($folder == 'php') { break; }
                	$rootFolderName .= '/'.$folder;
        	}

		$_rootURL = 'http://'.$_SERVER['SERVER_NAME'].$rootFolderName.'/';
		header("location:".$_rootURL.'index.php?err=2');
	}
?>
