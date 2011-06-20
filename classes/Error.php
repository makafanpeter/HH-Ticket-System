<?php

class Error {
    
    public function __construct() {
	}
    
    public function clear() {
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
    }
    
    public function add($title, $description) {
        $title = md5(strtolower(str_replace(" ", "_", $title)));
        
        if (!isset($_SESSION['error'][$title])) {
            $_SESSION['error'][$title] = $description;
        }
    }
    
    public function displayAllErrors() {
        if (isset($_SESSION['error'])) {
            $error_message = "<div class = \"error\">ERROR: ";
            foreach ($_SESSION['error'] as $key => $value) {
                $error_message .= $value . "<br />";
            }
            $error_message .= "</div>";
            
            $this->clear();
            return $error_message;
            
        }
    }
    
    public function displayError($title) {
        $title = md5(strtolower(str_replace(" ", "_", $title)));
        if (isset($_SESSION['error'])) {
            $error_message = "<div class = \"error\">ERROR: ";
            $error_message .= $_SESSION['error'][$title];
            $error_message .= "</div>";
            
            $this->clear();
            return $error_message;
        }
    }
    
    public function foundErrors() {
        return (isset($_SESSION['error'])) ? true : false;
    }
}

?>