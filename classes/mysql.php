<?PHP
/**
Simple MySQL Class currently under development.

Ideally a custom exception class should be created.
*/

class Mysql {

	protected $username;	// Holds username of database.
	protected $password;	// holds password of database.
	protected $host;		// holds host of database.
	
	private $lastQuery;		// Holds reference to last MySQL query.
	private $lastResult;	// Holds reference to last MySQL query result.
	private $arrayResult;	// Holds reference to the array of last fetched query results.
	private $objectResult;	// Holds reference to the object of last fetched query results.
	
	private $lastError; 	// Holds reference to last error occurance.
	
	/**
	Constructor 	- Constructs the Mysql class.
	@param			- Host, user and password of the MySQL database.
	*/
	public function __construct($host, $user, $pass) {
		$this->username = $user;
		$this->password = $pass;
		$this->host     = $host;
	}
	
	/**
	connect 		- Connects to a MySQL database using the params of the constructor.
	Return			- Returns MySQL connection.
	*/
	public function connect() {
		if (!$connection = mysql_connect($this->host, $this->username, $this->password)) {
			$this->lastError = mysql_error();
			throw new Exception("Exception: " . mysql_error());
		}
		return $connection;
	}
	
	/**
	selectDB	 	- Selcts the database which the objec will use to be queried.
	@param			- Database name.
	Return			- Returns the select database.
	*/
	public function selectDB($dbName, $connection = NULL) {
		if (!$dbName) {
			$this->lastError = "Empty parameter given.";
			throw new Exception("Exception: Empty parameter given ");
		}
		if ($connection) {
			if (!$selectedDB = mysql_select_db($dbName, $connection)) {
				$this->lastError = mysql_error();
				throw new Exception ("Exception: Could not select database" . mysql_error());
			}
		} else {
			if (!$selectedDB = mysql_select_db($dbName)) {
				$this->lastError = mysql_error();
				throw new Exception ("Exception: Could not select database" . mysql_error());
			}
		}
		return $selectedDB;
	}
	
	/**
	escape 			- Escapes a string/array of any xss injection.
	@param			- String or array to be escaped.
	Return			- Escaped string/array.
	*/
	public function escape($args) {
		if (is_array($args)) {
			foreach ($args as $arg) {
				$escaped[] = mysql_real_escape_string($arg);
			}
		} else {
			$escaped = mysql_real_escape_string($args);
		}
		return $escaped;
	}
	
	/**
	query 			- Submits a query to the database and returns it's results.
	@param			- SQL to be queried.
	Return			- Result of query.
	*/
	public function query($sql, $db = NULL) {
		if (!$sql) {
			$this->lastError = "No query string given.";
			throw new Exception ("Exception: No query string given");
		}
		if (!$db) {
			if (!$result = mysql_query($sql)) {
				$this->lastError = mysql_error();
				throw new Exception("Exception: " . mysql_error());
			}
		} else {
			if (!$result = mysql_query($sql, $db)) {
				$this->lastError = mysql_error();
				throw new Exception("Exception: " . mysql_error());
			}
		}
		$this->lastQuery = $sql;
		$this->lastResult = $result;
		return $result;
	}
	
	/**
	numRows			- Returns the count of rows which where found in the query.
	@param			- Result of mysql_query.
	Return			- Number of rows found from mysql_query result.
	*/
	public function numRows($qryResult) {
		return mysql_num_rows($qryResult);
	}
	
	/**
	result			- Returns the result of a query.
	@param			- Result of mysql_query.
	Return			- result of mysql_query result.
	*/
	public function result($qryResult, $row = 0) {
		return mysql_result($qryResult, $row);
	}
	
	/**
	fetchArray 		- Returns an Array of the queried results.
	@param			- Result of mysql_query.
	Return			- Array of mysql_query result.
	*/
	public function fetchArray($qryResult = NULL) {
		if ($qryResult == NULL) {
			if ($this->lastResult) $qryResult = $this->lastResult; 
		}
		$fetch = mysql_fetch_array($qryResult);
		$this->lastResult = $qryResult;
		$this->arrayResult = $fetch;
		return $fetch;
	}
	
	/**
	fetchObject 	- Returns an object of the queried results.
	@param			- Result of mysql_query.
	Return			- Object of mysql_query result.
	*/
	public function fetchObject($qryResult = NULL) {
		if ($qryResult == NULL) {
			if ($this->lastResult) $qryResult = $this->lastResult; 
		}
		$fetch = mysql_fetch_object($qryResult);
		$this->lastResult = $qryResult;
		$this->objectResult = $fetch;
		return $fetch;
	}
	
	/**
	fetchFields 	- Returns fields of a given database table
	@param			- Name of table to fetch fields from
	Return			- Multidimensional array of table fields on success, false on failure
	*/
	
	public function fetchFields ($tableName) {
		$tableFields = array();
		$result = $this->query("SHOW COLUMNS FROM " . $tableName);
		if ($result) {
			while ($row = $this->fetchArray($result)) {
				$tableFields[] = $row;
			}
			return $tableFields;
		}
		return false;
	}

}

?>