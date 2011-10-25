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
			//$_SESSION['token_auth'] = $this->user['user_id'];
			return true;
		}
		return false;
	}
	
	public function check_credentials($username, $password) {
		$username = $this->database->escape($username);
		$password = $this->database->escape($password);
		$password = Util::hashString($password, $this->getValKey($username));
		$query = $this->database->query("SELECT username,password FROM user WHERE username = '$username' AND password = '$password'");
		if ($this->database->fetchArray($query)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getValKey($username) {
		$query = $this->database->query("SELECT verify_key FROM user WHERE username = '$username'");
		if ($result = $this->database->fetchArray($query)) {
			return $result['verify_key'];
		}
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
        // Keeping it simple people must follow the naming scheme we document they can change it if they deem appropriate.
        // It posses a major security risks because people can easily find out what the fields are called in the database without
        // looking at the database.  Therefore its dangerous and leaves a vulnerability exposed to the system.
        
        //Util::cleanData($data);
        extract($details);
        
       // if (Util::isTextNoSpaces($username)) {
       //     if (!$this->isUsernameTaken("username", $username)) {
       //         if (Util::isEmail($email)) {
       //             if (!$this->isTaken("email", $email)) {
       //                 if ($password == $re_password) {
       //                    if (Util::isValidPassword($re_password) >= 0) {
		//                   	if (Util::isTextNoSpaces($habbo_name)) {
		//                             if (!Util::isNull($accept)) {
		//
										$valkey = Util::generateKey(8, 7);
                                        $now = date("U");
                                        $display_name = $username;
                                        $username = strtolower($username);
                                        $ip = $_SERVER['REMOTE_ADDR'];
                                        $password = Util::hashString($password, $valkey);
                                        $this->database->query("INSERT INTO user
														(username, display_name, password, email, ip, date_registered, habbo_name, verify_key)
														VALUES
														('$username', '$display_name', '$password', '$email', '$ip', '$now', '$habbo_name', '$valkey')");
                                       // $this->sendValidationEmail($valKey);
                                        $this->user = $this->check_credentials($username, $password);
										echo $valkey;
          //                            
         //                           }
         //                       }
         //                   }
        //                }
        //            }
       //         }
       //     }
      //  }
        
	}
	
	public function sendEmail ($body, $subject) {
        $headers = "From: no-reply@hh.net\r\n";
        mail($this->user['email'], $subject, $message, $headers);
    }
	
	    public function sendValidationEmail($validationKey) {
        $body = "Welcome, " . $this->user['username'] .
                "\n\nPlease copy and paste the URL below to verify this is your email.\n\n".
                "http://hh.net/validate.php?e=".$this->user['email']."&k=".$validationKey .
                "\n\nRegards,\nHH Staff.";
        $subject = "HH User Registration!";
        
        $this->sendEmail($body, $subject);
    }
	
    public function isTaken($feild, $value) {
        $query = $this->database->query("SELECT user_id FROM user WHERE $feild = '$value'");
        $result = $this->database->result($query);
        return ($result) ? true : false;
    }
    
}
?>