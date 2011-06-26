
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <title>HH</title>
    <link href = "css/main.css" rel = "stylesheet" type = "text/css" />
	<script src = "js/jquery.js"></script>
    <script type = "text/javascript">
        function change_img() {
            var img = document.getElementById("habbo_avatar");
            var username = document.getElementById("id_habbo").value;
            if (username.length > 0) {
                var link = "http://www.habbo.com/habbo-imaging/avatarimage?user=" + username + "&action=wav&direction=3&head_direction=3&gesture=sml&size=l";
                document.getElementById("habbo_check").innerHTML = "Is this you?";
                img.setAttribute("src", link);
                img.setAttribute("style", "display: block;");
            }
            else
            {
                document.getElementById("habbo_check").innerHTML = "";
                img.setAttribute("src", '');
                img.setAttribute("style", "display: none;");
            }
        }
		
		jQuery.fn.center = function () {
			this.css("position","absolute");
			this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
			this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
			return this;
		}
		$(document).ready(function(){
			$("#loginMain").center();
		});
    </script>
</head>

<body>
    <div id = "loginMain">
		<div id = "content" class = "rounded border shadow box">
 
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
                        <div class = "" align = "center">
							<a href = "login.php">Go back to Login</a>
                            <br /><h3 id = "habbo_check"></h3>
                            <img id = "habbo_avatar" alt = "" />
                        </div>
                    <br class = "clear" />
		</div>
</body>

</html>