<?php
    require_once("mayen-dbcon.php");
    $db = new db();
    $db->connect();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>NOTIF Sample Page - Imai</title>
    <style type="text/css">
        #notif-area
        {
            background-color: #a3a3e0;
            width: 30%;
            margin-top: 50px;
            margin-left:900px;
            height: auto;
            border: 2px #363636 solid;
            opacity: 0.8;
            border-radius: 5px;
            display:none;
            position:absolute;
        }
        
        #notif-area #message
        {
            color: #2c2c2c;
            text-align: center;
            padding: 10px; 
        }
        
        .logout
        {
            background-color: #a3a3e0;
            width:250px;
        }
    </style>
    
    <script src="jscript/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="jscript/notif.js"></script>
</head>

<body>
    
    WELCOME Imai! :)
    <div class="like-link">
        <a href="#" onclick="showNotif()">Like</a>
    </div>
    
<?php
    function pullNotif()
    {
        
        $SQL = "SELECT * FROM value";
        $ret = mysql_query($SQL);
        
        if ($ret)
        {
            echo "<form id=\"formNotif\" method=\"post\" action=\"\">";
                echo "<table align=\"center\" border=\"1\" width=\"80%\" style=\"color:white; background-color:#5959d6; border:1px black solid; padding:10px; font-size:18px;\">";
            
            while ($row = mysql_fetch_assoc($ret))
            {
                echo "<tr>";
                    echo "<td style='padding:5px;'>".$row['data']."</td>";
                echo "</tr>";
            }
            
                echo "</table>";
            echo "</form>";
        }
            
        else
            die(mysql_error());
    }

    function pushNotif()
    {
       
        $notif = "Post liked by Imai" . "<br>" . date("F d, Y - h:i a");
        
        $SQL = "INSERT INTO value(data) VALUES('$notif')";
        $ret = mysql_query($SQL);
        
        if ($ret)
            echo "";
            
        else
            die(mysql_error());
    }
?>

    <div id="notif-area">
        <div id="message">
            <?php
                pushNotif();
                pullNotif();
            ?>
        </div>
    </div>
    
    <div class="logout">
        <?php
            echo "<div onclick=\"window.location='signout.php';\" style=\"cursor:pointer; margin:0 43%; font-size:18px; color: black;\">Logout</div>";
            die();
        ?>  
    </div>
    
</body>
</html>