<?PHP
include "classes/db/mysql.php";
$mysql = new Mysql("localhost", "root","");
$mysql->connect();
$mysql->selectDB("test");
$result = $mysql->query("SELECT * FROM users");

while ($row = $mysql->fetchArray($res4ult)) {
	echo $row['username'] . " " . $row['password'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="banner"></div>
<div id="content_top"></div>
<div id="left_column">
<div id="blue_top"><div class="header">Hello</div></div>
<div id="small_mid">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ante nulla, congue ut blandit ut, suscipit condimentum nulla.</div>
<div id="small_bot"></div>
<div id="green_top">
  <div class="header">We're valid xhtml and css!</div>
</div>
<div id="small_mid2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ante nulla, congue ut blandit ut, suscipit condimentum nulla.</div>
<div id="small_bot2"></div>
</div>
<div id="middle_column">
<div id="pink_top"><div class="header">Welcome to the house of fun</div></div>
<div id="big_mid">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ante nulla, congue ut blandit ut, suscipit condimentum nulla. Donec nisi est, tempor vitae tincidunt eu, fringilla nec nulla. Nam ut magna sed enim luctus bibendum. <br />
<br />
Sed eu risus neque, aliquam gravida mi. Donec tincidunt ligula dictum magna semper a tempor lacus sollicitudin. Duis elit lorem, iaculis non condimentum vel, iaculis vel tellus. Phasellus suscipit nisi vel odio porta nec pharetra augue varius. Proin lorem velit, luctus ut interdum id, tincidunt id nulla. Sed iaculis sodales scelerisque. Vestibulum venenatis quam a urna ullamcorper aliquet. Duis sapien massa, tempus suscipit porttitor ut, porttitor ac ipsum.</div>
<div id="big_bot"></div>
</div>
<div id="footer"></div>
</div>
</body>
</html>
