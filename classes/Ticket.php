<?PHP

class Ticket {

	protected $database;
	protected $id;
	private $title;
	private $message;
    
    private $replies;
	
	public function __construct(Mysql $db, $id = NULL) {	
		$this->database = $db;
		$this->ticket_id = $id;
		
		if ($id) {
			$this->obtainTicket($id);
		}
	}
	
	private function obtainTicket($id) {
		$qry = $this->database->query("SELECT * FROM ticket WHERE ticket_id='$id'");
		$result = $this->database->fetchArray($qry);
		$this->title = $result['title'];
		$this->message = $result['message'];
	}
	
	public function generateID() {
		
	}
	
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getMsg() {
		return $this->message;
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
	
	public function getReplies() {
        
        $result = array();
		$qry = $this->database->query("SELECT * FROM ticket_reply WHERE ticket_id = '$this->ticket_id'");
		while ($row = $this->database->fetchArray($qry)) {
			$result[] = $row; 
		}
		return $result;
        
        /*
        if (Util::isNull($this->replies)) {
            $this->replies = $this->database->query("SELECT * FROM ticket_reply WHERE ticket_id = '$this->ticket_id'");
		}
        return $this->database->fetchArray($this->replies);
        */
	}
	
    public function hasReplies() {
        $qry = $this->database->query("SELECT * FROM ticket_reply WHERE ticket_id = '$this->ticket_id'");
		return $this->database->numRows($qry) > 0 ? true : false;
    }
    
	public function submitTicket() {
		
	}
	

}

?>