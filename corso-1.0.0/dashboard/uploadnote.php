
<?php include 'includes/connection.php';?>
<?php include 'includes/adminheader.php';?>

<?php 
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

header("location: index.php");
}
?>

<div id="wrapper">

       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       

<?php
if (isset($_POST['upload'])) {
require "../gump.class.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST); 

$gump->validation_rules(array(
    'title'    => 'required|max_len,60|min_len,3',
    'description'   => 'required|max_len,150|min_len,3',
));
$gump->filter_rules(array(
    'title' => 'trim|sanitize_string',
    'description' => 'trim|sanitize_string',
    ));
$validated_data = $gump->run($_POST);

if($validated_data === false) {
    ?> 
    <center><font color="red" > <?php echo $gump->get_readable_errors(true); ?> </font></center>
    <?php 
    $file_title = $_POST['title'];
      $file_description = $_POST['description'];
}
else {
    $file_title = $validated_data['title'];
      $file_description = $validated_data['description'];
if (isset($_SESSION['id'])) {
        $file_uploader = $_SESSION['username'];
        $file_uploaded_to = $_SESSION['course'];
    }

    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $validExt = array ('pdf', 'txt', 'doc', 'docx', 'ppt' , 'zip');
    if (empty($file)) {
echo "<script>alert('Attach a file');</script>";
    }
    else if ($_FILES['file']['size'] <= 0 || $_FILES['file']['size'] > 50000000 )
    {
echo "<script>alert('file size is not proper');</script>";
    }
    else if (!in_array($ext, $validExt)){
        echo "<script>alert('Not a valid file');</script>";

    }
    else {
        $folder  = 'allfiles/';
        $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
        $notefile = rand(1000 , 1000000) .'.'.$fileext;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $folder.$notefile)) {
            $query = "INSERT INTO uploads(file_name, file_description, file_type, file_uploader, file_uploaded_to, file) VALUES ('$file_title' , '$file_description' , '$fileext' , '$file_uploader' , '$file_uploaded_to' , '$notefile')";
            $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script> alert('file uploaded successfully.It will be published after admin approves it');
                window.location.href='notes.php';</script>";
            }
            else {
                "<script> alert('Error while uploading..try again');</script>";
            }
        }
    }
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Note</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="styles.css">
<style>
    body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, sans-serif;
  
}

.container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  margin-top:150px;
  margin-bottom:400px;
}

.page-header {
  text-align: center;
  font-size: 32px;
  color: #333;
  margin-bottom: 20px;
}


.form-container {
  width: 600px;
  padding: 30px;
  background-color: #fff;
  border-radius: 40px;
  box-shadow: 0 0 50px black;

}

.form-heading {
  margin-bottom: 20px;
  text-align: center;
  font-size: 24px;
  color: black;

}



.form-group {
  margin-bottom: 20px;
}

.form-group label {
  font-weight: bold;
}

.form-control {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn-primary {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  background-color: #2e6da4;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s;
}

.btn-primary:hover {
  background-color: #337ab7;
}

    </style>
</head>
<body>

<div class="container">
  <div class="form-container animate__animated animate__fadeInDown">
    <h1 class="form-heading"><b>Upload Note</b></h1>
    <form role="form" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="post_title">Note Title</label>
        <input type="text" name="title" class="form-control" placeholder="Eg: Php Tutorial File" required="">
      </div>

      <div class="form-group">
        <label for="post_tags">Short Note Description</label>
        <input type="text" name="description" class="form-control" placeholder="Eg: Php Tutorial File includes basic php programming ...." required="">
      </div>

      <div class="form-group">
        <label for="post_image">Select File</label><font color="red"> (allowed file type: 'pdf','doc','ppt','txt','zip' | allowed maximum size: 50 mb ) </font>
        <input type="file" name="file"> 
      </div>

      <button type="submit" name="upload" class="btn btn-primary" value="Upload Note">Upload Note</button>
    </form>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>





