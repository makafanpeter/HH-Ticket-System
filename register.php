<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <title>HH</title>
    <link href = "css/main.css" rel = "stylesheet" type = "text/css" />
    <script type = "text/javascript">
        function change_img() {
            var img = document.getElementById("habbo_avatar");
            var username = document.getElementById("id_habbo").value;
            if (username.length > 0) {
                var link = "http://www.habbo.com/habbo-imaging/avatarimage?user=" + username + "&action=wav&direction=3&head_direction=3&gesture=sml&size=l";
                
                img.setAttribute("src", link);
            }
        }
    </script>
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
                    <div class = "float-left">
                        <div class = "float-left">
                            <form action = "register_check.php" method = "post">
                                Username:<br />
                                <input type = "text" value = "" id = "id_user" name = "username" /><br />
                                Password:<br />
                                <input type = "password" value = "" id = "id_pass1" name = "password1" /><br />
                                Re-Password:<br />
                                <input type = "password" value = "" id = "id_pass2" name = "password2" /><br />
                                Email:<br />
                                <input type = "text" value = "" id = "id_email" name = "email" /><br />
                                Habbo name:<br />
                                <input type = "text" value = "" id = "id_habbo" name = "habbo" onkeyup = "change_img();" /><br />
                                Do you accept the Terms and Conditions? <input type = "checkbox" name = "agree" id = "id_chck" /><br />
                                <input type = "submit" value = "Register" name = "reg_btn" id = "id_reg" />
                            </form>
                        </div>
                        <div class = "float-right">
                            <img id = "habbo_avatar" alt = "" />
                        </div>
                    </div>
                    <br class = "clear" />
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