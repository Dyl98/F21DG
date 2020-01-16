<?php
	//
	// This MySQL Class written by Scott Straughan and used here with consent
	//

class CMySQL {

	var $sql_username;
	var $sql_password;
	var $sql_database;
	var $sql_hostname;
	
	var $sql_data_stream;
	var $sql_query_queue;

	
	function CMySQL($user="csm",$password="management",$db="csm",$host="mysql-server-1"){
		// Generate connection details
		$this->sql_username = $user;
		$this->sql_password = $password;
		$this->sql_database = $db;
		$this->sql_hostname = $host;
	}

	function connect_to_server(){
		// Check connection details and connect if ok
		if( !$this->sql_connection_stream = mysql_connect($this->sql_hostname,$this->sql_username,$this->sql_password) ) {
			return "SQL Error: Username, password or hostname is incorrect.";
		}
		// Connect to database
		if ( !mysql_select_db( $this->sql_database ) ) {
			return "SQL Error: Database `".$this->sql_database."` does not exist.";
		}
	}

	function sql_disconnect(){
		// Try and disconnect from the mysql connection
		if(mysql_close($this->sql_connection_stream)){
			return true;
		}
	}
	
	function query_server($query) {
		// Check if the current sql statement is valid
		if($this->validate_sql_query($query) == TRUE){
			// Query server
			$result = mysql_query($query);
			// Return the result of query
			return $result;
			
		}else{ return false; }
	}
	
	function validate_sql_query($query) {
		// Do some validation here
		mysql_real_escape_string($query);
		return true;
	}


	function get_row_count(){
		// Create connection to sql server
		$this->connect_to_server();
		// Return the number of rows for query
		return ( mysql_num_rows($this->query_server($this->sql_query_queue[0])) );
	}
	
	function get_data($query){
		// Create connection to sql server
		$this->connect_to_server();

		// Query the server
		$sql_result = $this->query_server($query);
		// Reserve some memory for result
		$result_array = array();
	
		// Fetch all the row and colum data
		while ( $result_row = mysql_fetch_assoc($sql_result) ) {
			$result_array[] = $result_row;
		}
		
		// Disconnect from sql server
		$this->sql_disconnect();
		
		return $result_array;
	}


	function add_query($query){
		$this->sql_query_queue[(count($this->sql_query_queue))] = $query;
	}

	function query(){
		// Create connection to sql server
		$this->connect_to_server();
		
		// Cycle through each query in queue and put result (or error) into a returning array
		for($counter = 0; $counter < (count($this->sql_query_queue)); $counter++){
		
			$return_results[$counter] = $this->query_server($this->sql_query_queue[$counter]);
			
			// If error occured, replace "result" with the error message
			if(mysql_error($this->sql_connection_stream)) { 
				$return_results[$counter] = mysql_error($this->sql_connection_stream);
			}
		}
		
		// Disconnect from sql server
		$this->sql_disconnect();

		return $return_results;
	}

}


?>
