<?php
	session_start();
	require_once("mayen-dbcon.php");
	$db = new db();
	$db -> connect();
	
	if(isset($_SESSION["isAdmin"])){
		header("Location:page-mayen.php");
		die();
	}

echo "<html>
    <head><meta charset=\"utf-8\"/>
        <title>Login</title>
        <style>
            html,body
            {
                width:1200px;
                margin:auto;
            }
            
            body
            {
                background-color:#eee;
                font-family:Trebuchet MS;
                font-size:16px; 
                color:#e5edf2;
            }
            
            table
            {
                background-color:#3962a5; 
                box-shadow:inset 0 0 5px black; 
                margin:10% auto; 
                padding:10px; 
                border-radius:15px;
            }
            
             #notif-area
            {
                background-color: #a3a3e0;
                width: 30%;
                margin-top: 250px;
                margin-left:390px;
                height: 30%;
                border: 2px #363636 solid;
                opacity: 0.8;
                border-radius: 5px;
                display:none;
                position:absolute
            }
            
            #notif-area #message
            {
                color: #2c2c2c;
                text-align: center;
                padding: 10px; 
            }
        </style>
        
        <script type=\"text/javascript\" >
            function validateURL(url){
                var user = document.getElementById('textuser');
                var pass = document.getElementById('textpass');
                
                if(user.value == '' || pass.value == ''){
                    alert('Error no Strings Found!');
                    user.value = '';
                    pass.value = '';
                }
                else{
                    document.getElementById('formtable').action = url;
                    document.getElementById('formtable').submit();
                }
            }
        </script>
    </head>"; 
            //Login
                //Username1 : Imai    Pass1:imai123
                //Username2: Patty      Pass2:patty123

echo "<body>
        <form id=\"formtable\" method=\"POST\" >
            <table align=\"center\" width=\"38%\" height=\"auto\" cellpadding=\"5\" cellspacing=\"5\" >
                <tr>
                
                    <td colspan='2' style=\"font-size:20px; color:#bad4ff;\">Login as:</td>
                </tr>
                
                <tr>
                    <td style=\"font-size:16px;\" align=\"right\" >Username:</td>
                    <td><input style=\"font-family:Verdana; padding:5px; border-radius:15px;\" type=\"text\"  id=\"textuser\" name=\"textuser\" placeholder=\"Enter Username\"/></td>
                </tr>
                
                <tr>
                    <td style=\"font-size:16px;\" align=\"right\" >Password:</td>
                    <td><input style=\"font-family:Verdana; padding:5px; border-radius:15px;\" type=\"password\"  id=\"textpass\" name=\"textpass\" placeholder=\"Enter Password\"/></td>
                </tr>
                
                <tr>
                    <td colspan=\"2\" align=\"center\" >
                        <input style=\"padding:5px; background-color:white; border-radius:10px;\" type=\"button\" value=\"Login\" onclick=\"javascript:validateURL('usersafe.php');\" /> &nbsp;&nbsp;
                        <input style=\"padding:5px; background-color:white; border-radius:10px;\" type=\"button\" value=\"Cancel\" onclick=\"javascript:window.location='index.php';\" />
                    </td>
                </tr>    
            </table>
        </form>
</body>
</html>";
?>
