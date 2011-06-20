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
                    <form action = "secure_check.php" method = "post">
                        Username:<br />
                        <input type = "text" value = "" id = "id_user" name = "username" /><br />
                        Password:<br />
                        <input type = "password" value = "" id = "id_pass" name = "password" /><br />
                        <div class = "float-left">
                            <div style = "margin: 8px 15px 0px 3px; padding: 3px 0px;" class = "float-left"><A href = "#">Forgot password?</a></div>
                            <div class = "float-right"><input type = "submit" value = "Login" name = "login_btn" id = "id_login" /></div>
                        </div>
                        <br class = "clear" />
                    </form>
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