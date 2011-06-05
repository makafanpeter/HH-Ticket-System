<?PHP
/**
Simple MySQL Class currently under development.

Ideally a custom exception class should be created.
*/

class Mysql {

	protected $username;
	protected $password;
	protected $host;
	
	public function __construct($host, $user, $pass) {
		$this->username = $user;
		$this->password = $pass;
		$this->host     = $host;
	}
	
	public function connect() {
		if (!$connection = mysql_connect($this->host, $this->username, $this->password)) {
			throw new Exception("Exception: " . mysql_error());
		}
		return $connection;
	}
	
	public function selectDB($dbName, $connection = NULL) {
		if (!$dbName) {
			throw new Exception("Exception: Empty parameter given ");
		}
		if ($connection) {
			if (!$selectedDB = mysql_select_db($dbName, $connection)) {
				throw new Exception ("Exception: Could not select database" . mysql_error());
			}
		} else {
			if (!$selectedDB = mysql_select_db($dbName)) {
				throw new Exception ("Exception: Could not select database" . mysql_error());
			}
		}
		return $selectedDB;
	}
	
	public function query($sql, $db = NULL) {
		if (!$sql) {
			throw new Exception ("Exception: No query string given");
		}
		if (!$db) {
			if (!$result = mysql_query($sql)) {
				throw new Exception("Exception: " . mysql_error());
			}
		} else {
			if (!$result = mysql_query($sql, $db)) {
				throw new Exception("Exception: " . mysql_error());
			}
		}
		return $result;
	}
	
	public function fetchArray($qryResult) {
		if (!$qryResult) {
			throw new Exception("Exception: No query result provided");
		}
		if (!$fetch = mysql_fetch_array($qryResult)) {
			if (mysql_error()) {
				throw new Exception("Exception: Unable to fetch results: " . mysql_error());
			}
		}
		return $fetch;
	}

}

?>