<?php
	/* Configuration file, you shouldn't have to edit these lines*/
	
	session_start();

        if ((!isset($_SESSION['root_url'])) || ($_SESSION['root_url'] == ''))
	{

   		// get curent directory structure eg "/top/second/third"
		$without_args = explode('?',$_SERVER['PHP_SELF'],2);
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



        	/* /!\ DO NOT EDIT ABOVE THIS LINE /!\ */
        	$_SESSION['root_path'] = dirname(realpath("../../index.php")).'/';	                // path to the root of the website on the server (for using with all "include()" functions)
        	$_SESSION['root_url'] = 'http://'.$_SERVER['SERVER_NAME'].$rootFolderName.'/';       		// url to the root of the website on the webserver (for using with all "header()" functions)
	}
?>
