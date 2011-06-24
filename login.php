<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <title>HH</title>
    <link href = "css/main.css" rel = "stylesheet" type = "text/css" />
	
	<script src = "js/jquery.js"></script>
	<script>
	
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
                    <form action = "secure_check.php" method = "post">
                        Username:<br />
                        <input type = "text" value = "" id = "id_user" name = "username" /><br />
                        Password:<br />
                        <input type = "password" value = "" id = "id_pass" name = "password" /><br />
                            <div class = ""><input type = "submit" value = "Login" name = "login_btn" id = "id_login" /></div>
							<div style = "margin: 8px 15px 0px 3px; padding: 3px 0px;" class = "float-left"><A href = "#">Forgot password?</a></div>
							<div style = "margin: 8px 15px 0px 3px; padding: 3px 0px;" class = "float-right"><A href = "#">Register</a></div>
						<br class = "clear" />
                    </form>
				</div>
            
        </div>
    </div>
</body>

</html>