<?php
	session_start();

	if (!isset($_SESSION['root_url']))
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

		$theRootUrl = 'http://'.$_SERVER['SERVER_NAME'].$rootFolderName.'/';
	}
	else
	{
        	$theRootUrl = $_SESSION['root_url'];
	}

	$_SESSION = array();    // all session's variables become 'null' (optional but more secure)

	if (isset($_COOKIE[session_name()]))    // erasing session's cookie
	{
		setcookie(session_name(),'',time()-4200,'/');
	}	

	session_destroy();      // destroying session

        $param = '';
        if (isset($_GET['err']))
        {
                $param = '?err='.$_GET['err'];
        }
	header('location:'.$theRootUrl.'index.php'.$param);
?>
