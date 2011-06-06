<?PHP
class User {
	
	protected $mysql;
	protected $username;
	protected $password;
	
	public function __construct($user, $pass) {
		$this->username = $user;
		$this->password = $pass;
		try {
			$this->mysql = new Mysql(HOST, USERNAME, PASSWORD);
		} catch (Exception $e) {
			die ($e->getMessage());	
		}
	}
	
	public function authenticate() {
		
	}
	
	public function deauthenticate() {
		
	}
	
	
	
}
?>