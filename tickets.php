<?PHP
function __autoload($class_name) {
    include $class_name . '.php';
}
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
                    <div id = "content-header" class = "rounded header">Welcome to the house of fun</div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ante nulla, congue ut blandit ut, suscipit condimentum nulla. Donec nisi est, tempor vitae tincidunt eu, fringilla nec nulla. 
                    Nam ut magna sed enim luctus bibendum. <br /><br />
                    Sed eu risus neque, aliquam gravida mi. Donec tincidunt ligula dictum magna semper a tempor lacus sollicitudin. Duis elit lorem, iaculis non condimentum vel, iaculis vel tellus.
                    Phasellus suscipit nisi vel odio porta nec pharetra augue varius. Proin lorem velit, luctus ut interdum id, tincidunt id nulla. Sed iaculis sodales scelerisque. 
                    Vestibulum venenatis quam a urna ullamcorper aliquet. Duis sapien massa, tempus suscipit porttitor ut, porttitor ac ipsum.
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