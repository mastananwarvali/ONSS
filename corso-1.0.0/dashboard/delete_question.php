<?php
include 'includes/connection.php'; // Include your database connection file

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $question_id = $_GET['id'];

    // Check if a confirmation has been made
    if(isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        // Delete question from the database based on the provided ID
        $delete_sql = "DELETE FROM questions WHERE id = $question_id";
        $delete_result = mysqli_query($conn, $delete_sql);

        if($delete_result) {
            // Redirect back to view page after successful deletion
            header("Location: view_questions.php");
            exit();
        } else {
            echo "Error deleting question: " . mysqli_error($conn);
        }
    } else {
        // Generate a random calculation
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operator = array('+', '-', '*')[array_rand(array('+', '-', '*'))];
        $result = eval("return $num1 $operator $num2;");
        // Ask for confirmation with the random calculation
        echo "<script>
                var answer = prompt('Please solve the following calculation to confirm deletion: $num1 $operator $num2');
                if (answer !== null && parseInt(answer) === $result) {
                    // Redirect with confirmation flag
                    window.location.href = 'delete_question.php?id=$question_id&confirm=true';
                } else {
                    alert('Incorrect answer. Deletion canceled.');
                    // Redirect back to view page if not confirmed
                    window.location.href = 'view_questions.php';
                }
              </script>";
    }
} else {
    // Redirect back to view page if ID not provided
    header("Location: view_questions.php");
    exit();
}
?>
