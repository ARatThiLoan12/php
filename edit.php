<?php
    $server = "localhost";
    $user = "root";
    $password ="";
    $dbName = "student";
    $db = new mysqli($server, $user, $password, $dbName);
?>

<html>
    <head>
        <style>
            .container{
            margin-left: 300px;
            margin-top: 50px;
            width: 800px;
        }
        .line{
            display: flex;
            width: 500px;
            justify-content: space-between;
            align-items: center;
        }
        </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form action="first.php" method="post">
                <input id="id" name="id">
                <input id="name" name="name">
                <input id="scoreJava" name="scoreC">
                <input id="scoreC" name="scoreJava">
                <button  name="edit">OK</button>
            </form>
        </div>
        <?php
         if(isset($_POST["idEdit"])){
             
            $ide = $_POST["idEdit"];
            
            $sele = "SELECT * from qlhocsinh where id =".$ide.";";
            $resulte = $db->query($sele)->fetch_all();
            echo"<script>
            document.getElementById('id').value = ".$resulte[0][0].";
            document.getElementById('name').value = '".$resulte[0][1]."';
            document.getElementById('scoreJava').value = ".$resulte[0][2].";
            document.getElementById('scoreC').value = ".$resulte[0][3].";
            </script>";
            } ?>
    </body>
</html>