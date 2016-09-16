<html>
    <head>
        <title>Index</title>
    </head>

    <body>
        <?php
            $randnumber = "";
            for($i=0;$i<8;$i++)
                $randnumber .= rand(0 , 9);
            $conn = new mysqli("localhost" , "root" , "0000" , "login");
            mysqli_query($conn,"insert into user (password) value ('$randnumber')");
        ?>
        <img src="http://qr.topscan.com/api.php?text=<?php echo $randnumber?>" width="300px"/>
        <input hidden="hidden" type="text" name="randnumber" id="randnumber" value="<?php echo $randnumber;?>" />
    </body>

    <script type="text/javascript">
        function polling() {
            var xmlHttp;
            if(window.XMLHttpRequest){
                xmlHttp = new XMLHttpRequest();
            }else {
                //xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                try{
                    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                }catch (e){
                    try{
                        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch (e){
                        window.alert("Dosen't support Ajax!!");
                    }
                }
            }

            randnumber = document.getElementById("randnumber").value;

            xmlHttp.onreadystatechange = function () {
                if(xmlHttp.readyState == 4){
                    result = xmlHttp.responseText;
                    if(result == "true"){
                        window.location.href = 'welcome.php';
                    }
                }
            }

            xmlHttp.open("get","polling.php?randnumber=" + randnumber,true);

            xmlHttp.send();
        }
        setInterval("polling()",2000);

    </script>

</html>