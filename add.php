
 <html>
     <head><style>
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
                <input id="name" name="name" placeholder="Enter name">
                <input id="scoreJava" name="scoreC" placeholder="Enter C score">
                <input id="scoreC" name="scoreJava" placeholder="Enter Java score">
                <button name="insert"><i class="fas fa-plus-square"></i></button>
            </form>
         </div>
    <?php
        $server = "localhost";
        $user = "root";
        $password ="";
        $dbName = "student";
        $db = new mysqli($server, $user, $password, $dbName);

        if(isset($_POST["insert"])){
            $name = $_POST["name"];
            $c = $_POST["scoreC"];
            $java = $_POST["scoreJava"];
        
            $sql = "INSERT INTO qlhocsinh() VALUES (null,'" .$name. "'," .$c ."," .$java.")";
            $db->query($sql);
        }

        $sql = "SELECT * from qlhocsinh";
        $result = $db->query($sql)->fetch_all();
    ?>
     </body>
 </html>