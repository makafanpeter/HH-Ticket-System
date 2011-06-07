<?PHP

class Ticket {

	public $database;
	public $title;
	public $message;
	
	
	public function __construct($db, $title, $msg, $id = NULL) {
		
		$this->database = $db
		$this->title = $title;
		$this->message = $message;
		
		try {
			$con = $this->database->connect();
			$selected = $this->database->selectDB("helptool", $con);
		} catch (Exception $e) {
			
		}		
		
		if ($id) {
			if ($this->exists($id)) {
				
			} else {
				$this->generateID();
			}
		}
		
	}
	
	public function exists($id) {
		$qry = $this->database->query("SELECT * FROM ticket WHERE ticket_id = '$id'");
		$fetch = $this->database->fetchArray($qry)
	}
	

}

?>