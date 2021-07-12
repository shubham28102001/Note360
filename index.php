<?php
//phpinfo();
    $connection = mysqli_connect('localhost', 'root', '', 'ckeditor') or die("Data is not connected".mysqli_connect_error());
    if(isset($_GET['delid'])){
        $deluser = $_GET['delid'];
        $alertmessage = "<div class='alert alert-danger'>
        <p>Are you sure you want to delete this record?</p>
        <form action='".htmlspecialchars($_SERVER['PHP_SELF'])."?id=
        $deluser' method='post'>
        <p><input type='submit' value='Yes' name='confirm-delete'
        class='btn btn-danger btn-sm'></p>
        <a href='#' class='close' data-dismiss='alert' 
        aria-label='close'>x</a>
        </form>
        </div>
        ";
        //<p><input type="submit" value="Submit" name="submit"></p>
        //<a href='#'><button type='button' class='close' data-dismiss='modal' aria-label='Close'>x</a>
    }
    // $id = $_GET['id'];
    // echo ($id);
    if(isset($_POST["confirm-delete"])){
        $id = $_GET['id'];
        $query = "DELETE FROM `content` WHERE id = '$id'";
        $result = mysqli_query($connection, $query);
        if($result){
            header('Location: index.php');
        } 
        else{
            echo "Error";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Note360</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/929c43ec12.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
        if(isset($alertmessage)) echo $alertmessage;
    ?>
    <!-- <a class="btn btn-success" href="index.php">Home</a>
    <a class="btn btn-success" href="show.php">Show</a> -->
    <div id="sidebar-container" style="display: inline-block; top: 195px; position: absolute;">
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            $query = "SELECT * FROM `content`";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["content"]."</td>";
                    //Shubham
                    // echo '<td><a href="update.php?id='.$row['id'].'" type="button" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span></a></td>';
                    //Shubham
                    echo '<td><a href="update.php?id='.$row['id'].'" type="button" class="btn btn-dark btn-sm"><span class="fa fa-edit"></span></a></td>';
                    echo '<td><a href="index.php?delid='.$row['id'].'" type="button" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a></td>';
                }
            }
        ?>
        </table>
    </div>
    <div id="editor-container" style="display: inline-block;">
        <iframe src="editor.php" frameborder="0" height="600px" width="1000px"
            style="margin-left: 320px; top: 150px; position: absolute"></iframe>
    </div>
    <!-- <br><br> -->
</body>

</html>