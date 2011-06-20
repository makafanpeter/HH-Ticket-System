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
}
?>