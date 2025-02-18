<?php

include 'includes/connection.php'; // Include your database connection file
include 'includes/adminheader.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $subject = $_POST['subject'];
    $department = $_POST['department'];
    $question = $_POST['question'];
    $comment = $_POST['comment']; // Added comment retrieval
    $answer = $_POST['answer']; // Added large answer retrieval

    // Check if file has been uploaded
    if (!empty($_FILES["image"]["name"])) {
        $targetDir = "uploads/"; 
        $imageName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $imageName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFilePath)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size (you can adjust this according to your requirements)
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats (you can adjust this according to your requirements)
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Image uploaded successfully, now insert data into database
                $sql = "INSERT INTO questions (subject, department, question, image, comment, answer) 
                        VALUES ('$subject', '$department', '$question', '$imageName', '$comment', '$answer')";
                
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Question Posted successfully.');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else { 
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else { // If no image is uploaded
        // Insert form data into the database without the image
        $sql = "INSERT INTO questions (subject, department, question, comment) 
                VALUES ('$subject', '$department', '$question', '$comment')";
                
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Question Posted successfully.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* General Styles */
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

#wrapper {
    width: 50%;
    margin: 0 auto;
    margin-top: 95px; 
}

#page-wrapper {
    
    background-color: #fff;
    padding: 20px;
    margin-top: 45px;
    border-radius: 40px;
    box-shadow: 0 0 15px black;
}

/* Form Styles */
form {
    margin-top: 20px;
}

form div {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
select,
textarea {
    width: calc(100% - 22px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

input[type="submit"] {
    width: 100%;
    background-color: #2e6da4;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #337ab7;
}

/* Error and Success Message Styles */
.error, .success {
    font-size: 14px;
    margin-top: 5px;
    padding: 5px 10px;
    border-radius: 4px;
}

.error {
    color: #dc3545;
    background-color: #f8d7da;
}

.success {
    color: #28a745;
    background-color: #d4edda;
}


    </style>
</head>
<body>

    <div id="wrapper">
        <?php include 'includes/adminnav.php';?> 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Question Form</h2>
                    <form action="" method="post" enctype="multipart/form-data" id="question-form">
                        <div>
                            <b>Subject:</b>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div>
                            <b>Department:</b>
                            <select id="department" name="department" required>
                                <option value="">Select Department</option>
                                <option value="IT">Department of Mathematics</option>
                                <option value="IT">School of Business </option>
                                <option value="HR">School of Computer Science and Engineering</option>
                                <option value="IT">Department of Physics</option>
                                <option value="Finance">School of Electronics Engineering</option>
                                <option value="IT">Department of Chemistry</option>
                                <option value="Finance">School of Mechanical Engineering</option>
                                <option value="IT">School of Law </option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div>
                            <b>Question:</b> <br>
                            <textarea id="question" name="question" rows="4" required></textarea>
                        </div>
                        <div>
                            <b>Answer Image:</b>
                            <input type="file" id="image" name="image">
                        </div>
                        <div>
                            <b>Answer</b><br>
                            <textarea id="answer" name="answer" rows="6"></textarea>
                        </div>
                        <div>
                            <b>Comment:</b><br>
                            <textarea id="comment" name="comment" rows="4"></textarea>
                        </div>
                        
                       

                        <div>
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>