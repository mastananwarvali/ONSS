<?php
include 'includes/connection.php'; // Include your database connection file
include 'includes/adminheader.php';

// Fetch all questions from the database
$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);
?>

<div id="wrapper">
    <?php include 'includes/adminnav.php';?>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

                    <title>View Questions</title>
                    <!-- Add any CSS stylesheets if needed -->
                </head>
                <style>
              table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 12px;
    border: 1.5px solid #ddd; /* Add border to create lines */
    text-align: left;
}

table th {
    background-color:black;
    color: white;
} 

table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tbody tr:hover {
    background-color: #ddd;
    transition: background-color 0.3s ease;
}

table tbody td img {
    display: block;
    margin: 0 auto;
    max-width: 100px;
    max-height: 100px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table tbody td .answer {
    max-height: 150px;
    overflow-y: auto;
    padding: 6px 12px;
}

table tbody td a {
    display: inline-block;
    text-decoration: none;
    color: #333;
    padding: 6px 12px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

table tbody td a:hover {
    background-color: #f2f2f2;
}

                </style>
                <body>

                    <h2 style="text-align:center;">View Questions</h2> 
                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Department</th>
                                <th>Question</th>
                                <th>Image</th>
                                <th>Answer</th>
                                <th>Comment</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Display fetched questions in table rows
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['subject'] . "</td>";
                                echo "<td>" . $row['department'] . "</td>";
                                echo "<td>" . $row['question'] . "</td>";
                                // Assuming image file paths are stored in "uploads" directory
                                echo "<td style='text-align: center; vertical-align: middle;'><img src='uploads/" . $row['image'] . "' height='100', width='100'></td>";
                                echo "<td class='answer'>" . (isset($row['answer']) ? $row['answer'] : "") . "</td>"; 
                                echo "<td style='color:red;'>" . (isset($row['comment']) ? $row['comment'] : "") . "</td>"; 

                                echo "<td style='text-align: center; vertical-align: middle;'><a href='edit_question.php?id=" . $row['id'] . "'><i class='fas fa-edit'></i></a></td>"; // Edit link
                                echo "<td style='text-align: center; vertical-align: middle;'><a href='delete_question.php?id=" . $row['id'] . "'><i class='fas fa-trash'></i></a></td>"; // Delete link
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <script src="js/jquery.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                </body>
                </html>

                <?php
                // Close database connection
                mysqli_close($conn);
                ?>