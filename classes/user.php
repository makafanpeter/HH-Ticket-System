<?PHP
class User {
	
	protected $database;
	
	private $user;
	
	public function __construct(Mysql $db) {	
		$this->database = $db;
	}
	
	public function login($username, $password) {
		if ($user = $this->check_credentials($username, $password)) {
			$this->user = $user;
			$_SESSION['token_auth'] = $this->user['user_id'];
			return $user;
		}
		return false;
	}
	
	public function check_credentials($username, $password) {
		$username = $this->database->escape($username);
		$password = $this->database->escape($password);
		
		$query = $this->database->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		$result = $this->database->fetchArray($query);
        
        if ($result) return $result;
        return false;
	}
	
	public function logout() {
		if ($user) {
			$this->user = null;
			unset($_SESSION['token_auth']);
			return true;
		}
		return false;
	}
    
	public function authenticate($authKey) {
		if ($this->user) {
			if ($authKey == $this->database->result($this->database->query("SELECT verify_key FROM user where user_id = '".$this->user['user_id']."'"))) {
				$this->database->query("UPDATE user SET verified = '1' WHERE user_id = '".$this->user['user_id']."'");
				return true;
			}
		}
		return false;
	}
	
	public function deauthenticate() {
		if ($this->user) {
			$this->database->query("UPDATE user SET verified = '0' WHERE user_id = '".$this->user['user_id']."'");
			return true;
		}
		return false;
	}
	
	public function isAuthenticated() {
		return $this->$user["verified"];
	}
	
	public function isOnline() {
		$time_now = date("U");
		$online_time = $this->user['online_time'];
		$time_frame = ((15 * 60) * 60); // 15 Minutes
		
		if (($online_time + $time_frame) >= $time_now) {
			$this->database->query("UPDATE user SET online_time = '$time_now' WHERE user_id = '".$this->user['user_id']."'");
			return true;
		}
		return false;
	}
	
	public function tableMatch($details) {
		$fieldArray = $this->database->fetchFields("user");
		$fields = array();
		$match = array();
		foreach ($fieldArray as $val) {
			$fields[] = $val['Field'];
		}
		foreach ($details as $dkey => $detail) {
			$match[] = in_array($dkey, $fields, true);
		}
		return $match;
	}
	
	public function register($details) {
		// Make sure $details array keys match the user table fields
		// Allows users to have their own naming schemes for variables
		/*
        $matches = $this->tableMatch($details);
		if (in_array(false, $matches, true)) {
			throw new Exception("Html post variables do not match user table entries.");
		}
		*/
		// INSERT INTO users table (field1 = $details['field1']) etc
		// since user table fields must have a match of details array keys 
		// you obviously know your own table names and you know which array element must go into them
		// because each array element matches exact to the table field where it has to be stored
		
		// So you know that for example $details['username'] will be inserted into username field in the
		// table because the script will not allow the key name and table name to be different
		// And you know that its $details['username'] because you either wrote the html or someone else did
		// and you can read the input box name
 		
		// unsure how to validate though.. :D
		
		// Sigh - confused myself with this code. 
		
        // Keeping it simple people must follow the naming scheme we document they can change it if they deem appropriate.
        // It posses a major security risks because people can easily find out what the fields are called in the database without
        // looking at the database.  Therefore its dangerous and leaves a vulnerability exposed to the system.
        
        Util::cleanData($data);
        extract($details);
        
        if (Util::isTextNoSpaces($username)) {
            if (!$this->isUsernameTaken("username", $username)) {
                if (Util::isEmail($email)) {
                    if (!$this->isTaken("email", $email)) {
                        if ($password == $re_password) {
                            if (Util::isValidPassword($re_password) >= 0) {
                                if (Util::isTextNoSpaces($habbo_name)) {
                                    if (!Util::isNull($accept)) {
                                        // Everything passed validation!
                                        
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
	}
	
    public function isTaken($feild, $value) {
        $query = $this->database->query("SELECT user_id FROM user WHERE $feild = '$value'");
        $result = $this->database->result($query);
        return ($result) ? true : false;
    }
    
}
?>