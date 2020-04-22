<?php
/**
 * @file 	mysql.php
 * @brief 	Common mysqli functions that are used throughout.
 */

class mySQLi_helper {

	var $sql_username;
	var $sql_password;
	var $sql_database;
	var $sql_hostname;
	
	var $mysqli_connection;

	var $sql_query_queue;

	/**
	 * @brief 	Constructor function that is called whenever the class is instantiated
	 *
	 * @param 	$user 		Username used to connect to the database
	 * @param 	$password 	Password used to connect to the database
	 * @param 	$db 		Database to connect to
	 * @param 	$host 		Host to connect to. This is where the database is located
	 */
	function __construct($user="csm",$password="management",$db="tommy_test",$host="localhost"){
		// Generate connection details
		$this->sql_username = $user;
		$this->sql_password = $password;
		$this->sql_database = $db;
		$this->sql_hostname = $host;
	}

	/**
	 * @brief 	Connects to the database with the credentials given in the constructor function
	 */
	function connect_to_database(){
		try {
			$this->mysqli_connection = new PDO("mysql:host=$this->sql_hostname;dbname=$this->sql_database", $this->sql_username, $this->sql_password);
			$this->mysqli_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "Failed to connect to MySQL: " . $e->getMessage();
			exit();
		}
	}

	/**
	 * @brief 	Closes a connection to the database
	 */
	function disconnect_from_database(){
		$this->mysqli_connection = null;
	}

	/**
	 * @brief 	Executes a given query and returns the output
	 *
	 * @param 	$query 	Query to be executed
	 *
	 * @return 	A mysqli_result object if the query was SELECT, SHOW, DESCRIBE, or EXPLAIN
	 * @return	True for other successful queries
	 * @return	False on failure
	 */
	function query_database($query){

		// Create connection to sql server
		$this->connect_to_database();

		$stmt = $this->mysqli_connection -> query($query);
		$result = $stmt->fetchAll();

		// Disconnect from sql server
		$this->disconnect_from_database();
		
		return $result;
	}

	//----------------------------------------------------------------\\
	//                    TODO: REMOVE ALL BELOW                      \\
	//----------------------------------------------------------------\\	
	function add_query($query){
		$this->sql_query_queue[(count($this->sql_query_queue))] = $query;
	}

	function query(){
		// Create connection to sql server
		$this->connect_to_database();
		
		// Cycle through each query in queue and put result (or error) into a returning array
		for($counter = 0; $counter < (count($this->sql_query_queue)); $counter++){
		
			$return_results[$counter] = $this->query_database($this->sql_query_queue[$counter]);
			
			// If error occured, replace "result" with the error message
			if(mysql_error($this->sql_connection_stream)) { 
				$return_results[$counter] = mysql_error($this->sql_connection_stream);
			}
		}
		
		// Disconnect from sql server
		$this->disconnect_from_database();

		return $return_results;
	}

}


?>
