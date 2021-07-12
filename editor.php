<?php
    include('connection.php');
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
            $insert_q = "INSERT INTO `content` (content) values ('$content')";
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
    <!-- <br><br><br><br> -->
    <!-- <a class="btn btn-success" href="index.php">Home</a>
    <a class="btn btn-success" href="index.php">Show</a> -->
    <form action="" method="post" enctype="multipart/form-data">
        <p><input type="submit" value="Save" name="submit" class="btn btn-success btn-sm"></p>
        <textarea name="editor" id="editor"></textarea>
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