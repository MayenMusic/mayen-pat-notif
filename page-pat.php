<?php
    require_once("mayen-dbcon.php");
    $db = new db();
    $db->connect();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>NOTIF Sample Page - Pat</title>
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
            width:150px;
            border: 2px black solid;
            margin-top: -40px;
            margin-left: 1150px;
        }

        .body{
            width: 99%;
            height:1000px;
            border: 5px black solid;
        }

        .header{
            width: 100%;
            height: 50px;
            background-color: #2c2c2c;
        }

        .profilename{
            width: 30%;
            height: 45px;
            background-color: #a3a3e0;
            margin-left: 70%;
        }

        #images1{
            width: 35px;
            height: 35px;
            margin-left: 20px;
            margin-top: 4px;
            border-radius: 5px;
        }

         #images2{
            width: 230px;
            height: 230px;
            margin-left: 20px;
            margin-top: 4px;
            border-radius: 5px;
        }

        #images3{
            width: 50px;
            height: 50px;
            margin-left: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }



        #name{
            margin-top: 7px;
            font-family: Arial;
            margin-left: 60px;
            margin-top: -35px;
            font-size: 20px;
            font-weight: bold;
        }

        #like{
            margin-left: 50px;
        }
    </style>
    
    <script src="jscript/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="jscript/notif.js"></script>

</head>

<body>
    <div class = "body">
    <div class="like-link">
        <div class = "header">
        <div class = profilename>
                <img src = "image/patty.jpg" id = "images1"> 
                <p id = "name">Patty Marasigan</p>

        </div>

        <div> <img src = "image/mayen.jpg" id = "images3"> <p style="margin-top: -50px; margin-left: 80px;"> Mayen Malabanan <br> May 28 </p></div>
         <img src = "image/mayen.jpg" id = "images2">  <img src = "image/mayen.jpg" id = "images2"> <img src = "image/mayen.jpg" id = "images2"><br>
        <a href="#" onclick="showNotif()" id = "like"> Like</a> 

        <div> <img src = "image/patty.jpg" id = "images3"> <p style="margin-top: -50px; margin-left: 80px;"> Patty Marasigan <br> May 28 </p></div>
         <img src = "image/patty.jpg" id = "images2">  <img src = "image/patty.jpg" id = "images2"> <img src = "image/patty.jpg" id = "images2"><br>
        <a href="#" onclick="showNotif()" id = "like"> Like</a> 

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
                echo "<p style =\"font-weight=bold; font-size: 20px;\"> Notifications </p>";
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
       
        $notif = "Post liked by Patty" . "<br>" . date("F d, Y - h:i a");
        
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
                        echo "<div onclick=\"window.location='signout.php';\" style=\"cursor:pointer; margin:0 35%; font-size:18px; color: black;\">Logout</div>";
                        die();
                    ?>  
                </div>
    </div>



    
    

    
    
    
</body>
</html>