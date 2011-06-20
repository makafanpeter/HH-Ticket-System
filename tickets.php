<?PHP
function __autoload($class_name) {
    include 'classes/' . $class_name . '.php';
}
$mysql = new Mysql("localhost", "root", "");

//// hardcode a user id for now...
$uid = 1;

$con = $mysql->connect();
$database = $mysql->selectDB("hh", $con);

///// Create tickets

/////


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <title>HH</title>
    <link href = "css/main.css" rel = "stylesheet" type = "text/css" />
</head>

<body>
    <div id = "main">
        <div id = "banner"></div>
        
        <div id = "container" class = "float-left">
            <div id = "column1" class = "float-left">
            
                <div id = "navigation" class = "float-left rounded border shadow box">
                    <div id = "navigation-header" class = "rounded header">Navigation</div>
                    <ul>
                        <li><a href = "index.php">Home</a></li>
                        <li><a href = "tickets.php">View Ticket</a></li>
                        <li><a href = "details.php">Change Details</a></li>
                        <li><a href = "logout.php">Logout</a></li>
                    </ul>
                </div>
                
                <div id = "box" class = "float-left rounded border shadow box">
                    <div id = "box-header" class = "rounded header">We're valid xhtml and css!</div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ante nulla, congue ut blandit ut, suscipit condimentum nulla.
                </div>
            </div>
            
            <div id = "column2" class = "float-left">
                <div id = "content" class = "float-left rounded border shadow box">
				<?PHP if (!isset($_GET['id'])) { 
                $qry = $mysql->query("SELECT * FROM ticket WHERE user_id = '$uid'");
                                
                if ($qry) {
                ?>
				
                    <div id = "content-header" class = "rounded header">Tickets</div>
						<table border = "1">
							<tr><th>ID</th><th>Title</th><th>Status</th><th>Data Created</th></tr>
						<?php
						///// List tickets
						
						while ($row = $mysql->fetchArray($qry)) {
							$ticket = new Ticket($mysql, $row['ticket_id']);
							echo "<tr><td><a href = \"tickets.php?id=".$row['ticket_id']."\">", $row['ticket_id'], "</a>",
							"</td><td>", $ticket->getTitle(),
							"</td><td>Status</td><td>Data Created</td></tr>";
							
						}
                        ?>
                        </table>
                        <?php
                        } else {
                            echo "No tickets!";
                        }
				} else {
							$ticket = new Ticket($mysql, $_GET['id']);
							if ($ticket->hasReplies()) {
                                while ($tmp = $ticket->getReplies()) {
                                    echo $val . "<br />";
                                }
                            } else {
                                echo "No replies!";
                            }
						}
				?>
                </div>
            </div>
            
            <div id = "footer" class = "clear">
                Copy&copy; 2011 - All Rights Reserved.
            </div>
            
            <div id = "bottom">
            </div>
        </div>
    </div>
</body>

</html>