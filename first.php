<?php

$server = "localhost";
$user = "root";
$password ="";
$dbName = "student";
$db = new mysqli($server, $user, $password, $dbName);

//insert
if(isset($_POST["insert"])){
    $name = $_POST["name"];
    $c = $_POST["scoreC"];
    $java = $_POST["scoreJava"];

    $sql = "INSERT INTO qlhocsinh() VALUES (null,'" .$name. "'," .$c ."," .$java.")";
    $db->query($sql);
}

//delete
if(isset($_POST["idDelete"])){
    $id = $_POST["idDelete"];

    $sql = "DELETE from qlhocsinh where id = ".$id;
    $db->query($sql);
}
//edit
if(isset($_POST["edit"])){
    $id = $_POST["id"];
    echo($id);
    $name = $_POST["name"];
    $c = $_POST["scoreC"];
    $java = $_POST["scoreJava"];

    $sql="UPDATE qlhocsinh SET name='".$name."',java=".$java.",c=".$c."WHERE id=".$_POST["edit"];
    $db->query($sql);
}

 $sql = "SELECT * from qlhocsinh";
 $result = $db->query($sql)->fetch_all();

?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    .container{
        margin-left: 300px;
        margin-top: 50px;
        width: 600px;
    }
    .line{
        display: flex;
        width: 500px;
        justify-content: space-between;
        align-items: center;
    }
    button{
        border-radius: 1px;
        background-color: orange;
        color: red;
    }
    .add{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .ban{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    table{
        width: 500px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    table,th,td{
        margin-top: 30px;
        border: 1.5px solid lightgrey;
        margin-left: 15px;
        border-collapse: collapse;
        text-align: center;
        align-items: center;
        justify-content:space-between;
    }
    th,td{
        width: 150px;
    }
    .comment{
        color: red;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="ban">
            <h2>Student Management</h2>
            <button action="" method="post">Sort</button>
        </div>
        <div class="add">
            <form action=""method="POST">
                <input type="text" name="name" placeholder="Enter name">
                <input type="text" name="scoreC" placeholder="Enter C score">
                <input type="text" name="scoreJava" placeholder="Enter Java score"> 
                <button type="" name="insert"><i class="fas fa-plus-square"></i></button>
            </form>
        </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>C score</th>
            <th>Java score</th>
            <th>Average score</th>
            <th>Level</th>
            <th>Options</th>
        </tr>
        <?php for($i = 0; $i < count($result); $i++) { ?>
        <div class="line">
            <tr>
                <td><h3><?php echo $result[$i][0]; ?></h3></td>
                <td><h3><?php echo $result[$i][1]; ?></h3></td>
                <td><h3><?php echo $result[$i][2]; ?></h3></td>
                <td><h3><?php echo $result[$i][3]; ?></h3></td>
                <?php $aver = ($result[$i][2] + $result[$i][3])/2; ?>
                <td><h3><?php echo $aver; ?></h3></td>
                <td><p class="comment"><?php if($aver>=9){
                    echo("VeryGood");
                    }
                    else if($aver>=8){
                        echo("Good");
                    }
                    else if($aver>=6){
                        echo("Quite Good");
                    }
                    else echo("Average");
                    ?></p></td>
                <td>
                    <form action="" method="post">
                    <button name="idDelete" value="<?php echo $result[$i][0] ?>"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <form action="edit.php" method="post">
                        <button name="idEdit" value="<?php echo $result[$i][0] ?>"><i class="far fa-edit"></i></button>
                    </form>
                </td> 
            </tr>
        </div>
        <?php } ?>
    </table>      
    </div>

    
    </div>

</body>
</html>
