<?PHP
/**
Simple MySQL Class currently under development.

Ideally a custom exception class should be created.
*/

class Mysql {

	protected $username;
	protected $password;
	protected $host;
	
	public function __construct($user, $pass, $host) {
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
	
	public function selectDB($connection, $tableName) {
		if (!$connection) {
			throw new Exception("Exception: Empty parameter given ");
		}
		if (!$selectedDB = mysql_select_db()) {
			throw new Exception ("Exception: Could not select database" . mysql_error());
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
			
			}
		}
	}

}

?>