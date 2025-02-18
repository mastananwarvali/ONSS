<?php
include 'includes/connection.php'; // Include your database connection file

// Check if ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $question_id = $_GET['id'];

    // Fetch question from the database based on the provided ID
    $sql = "SELECT * FROM questions WHERE id = $question_id";
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully and fetched at least one row
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Redirect back to view page if question not found or query failed
        header("Location: view_questions.php");
        exit();
    }
} else {
    // Redirect back to view page if ID not provided
    header("Location: view_questions.php");
    exit();
}
if(isset($_POST['submit'])) {
    // Retrieve form data
    $subject = $_POST['subject'];
    $department = $_POST['department'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    
    // Check if a new image is uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . $image_name;

        // Move uploaded image to the uploads directory
        if(move_uploaded_file($image_tmp, $image_path)) {
            // Update question in the database with the new image path
            $update_sql = "UPDATE questions SET subject = '$subject', department = '$department', question = '$question', answer = '$answer', image = '$image_name' WHERE id = $question_id";
            $update_result = mysqli_query($conn, $update_sql);

            if($update_result) {
                // Redirect back to view page after successful update
                header("Location: view_questions.php");
                exit();
            } else {
                echo "Error updating question: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        // Update question in the database without changing the image
        $update_sql = "UPDATE questions SET subject = '$subject', department = '$department', question = '$question', answer = '$answer' WHERE id = $question_id";
        $update_result = mysqli_query($conn, $update_sql);

        if($update_result) {
            // Redirect back to view page after successful update
            header("Location: view_questions.php");
            exit();
        } else {
            echo "Error updating question: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Question</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image:
        radial-gradient(at 61% 4%, hsla(303, 91%, 61%, 1) 0px, transparent 50%),
        radial-gradient(at 75% 66%, hsla(196, 91%, 79%, 1) 0px, transparent 50%),
        radial-gradient(at 98% 88%, hsla(76, 87%, 78%, 1) 0px, transparent 50%),
        radial-gradient(at 23% 16%, hsla(238, 96%, 77%, 1) 0px, transparent 50%),
        radial-gradient(at 95% 65%, hsla(13, 91%, 75%, 1) 0px, transparent 50%),
        radial-gradient(at 10% 79%, hsla(228, 96%, 69%, 1) 0px, transparent 50%),
        radial-gradient(at 85% 58%, hsla(328, 81%, 68%, 1) 0px, transparent 50%);
 

        }
        
        
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 60%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        img {
            display: block;
            margin: 0 auto 15px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            align-items: center;
        }
        input[type="file"] {
            margin-bottom: 20px;
        } 
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            align-items: center;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #a{
            background-color:white;
            height:720px;
            width:500px; 
            border-radius:80px;
            text-align:center;
            
        }
    </style>
</head>
<body>
    <div id="a">
        <h2>Edit Question</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Subject:</label><br>
            <input type="text" name="subject" value="<?php echo $row['subject']; ?>"><br>
            <label>Department:</label><br>
            <input type="text" name="department" value="<?php echo $row['department']; ?>"><br>
            <label>Question:</label><br>
            <textarea name="question"><?php echo $row['question']; ?></textarea><br>
            <label>Current Image:</label><br>
            <img src="uploads/<?php echo $row['image']; ?>" height="100" width="100"><br>
            <label>New Image:</label><br>
            <input type="file" name="image"><br>
            <label>Answer:</label><br>
            <textarea name="answer"><?php echo $row['answer']; ?></textarea><br>
            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>


<?php
// Close database connection
mysqli_close($conn);
?>