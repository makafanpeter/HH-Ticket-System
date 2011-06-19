<?PHP

class Ticket {

	protected $database;
	private $title;
	private $msg;
	
	public function __construct(Mysql $db) {	
		$this->database = $db;
	}
	
	public function exists($id) {
		$qry = $this->database->query("SELECT * FROM ticket WHERE ticket_id = '$id'");
		$rows = $this->database->numRows($qry);
		if ($rows > 0) {
			return true;
		} else { 
			return false;
		}
	}
	
	public function generateID() {
		
	}
	
	
	public function getTitle() {
		$qry = $this->database->query("SELECT * FROM tickets WHERE ticket_id = '$id'");
		$result = $this->database->fetchArray($qry);
		return $result['title'];
	}
	
	public function getMsg() {
		$qry = $this->database->query("SELECT * FROM tickets WHERE ticket_id = '$id'");
		$result = $this->database->fetchArray($qry);
		return $result['message'];
	}
	
	public function setTitle($title) {
		if (!empty($title)) {
			$this->title = $title;
			return true;
		}
		return false;
	}
	
	public function setMsg($msg) {
		if (!empty($msg)) {
			$this->message = $msg;
			return true;
		}
		return false;
	}
	
	public function submitTicket() {
		
	}
	

}

?>