<?php
    include('connection.php');
    if($_GET['id']){
        $id = $_GET['id'];
        $query = "SELECT * FROM `content` WHERE id = '$id'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $content = $row['content'];
            }
        }
        else 'Hello';
    }
    else{
        header('Locaton: index.php');
    }

    if(isset($_POST['submit'])){
        if(isset($_POST['editor']) && !empty($_POST['editor'])){
            $content = $_POST['editor'];
            //echo 'H3';
        }
        else{
            $empty_error = '<b class="text-danger text-center>
            Please fill the textarea</b>';
            //echo 'H2';
        }
        if(isset($content) && !empty($content)){
            $insert_q = "UPDATE `content` SET content = '$content' WHERE id='$id'";
            if(!mysqli_query($connection, $insert_q)){
                $submit_error = '<b class="text-danger text-center>
                You are not able to submit</b>';
            }
        }
    }
    //else echo 'H4';
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
</head>

<body>
    <!-- <a class="btn btn-success" href="index.php">Home</a>
    <a class="btn btn-success" href="show.php">Show</a> -->
    <?php if(isset($submit_error)) echo $submit_error; ?>
    <?php if(isset($empty_error)) echo $empty_error; ?>
    

    <form action="" method="post" enctype="multipart/form-data">
        <p><input type="submit" value="Save" name="submit" class="btn btn-success btn-sm"></p>
        <br>
        <textarea name="editor" id="editor"><?php if(isset($content))
        echo $content; ?> </textarea>
        <!-- <p><input type="submit" value="Submit"></p> -->
        <br>
        <!-- <button type="submit" name="submit" class="btn btn-success">Save</button> -->
        <!-- <span class="fa fa-save"></span> -->
    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>