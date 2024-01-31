<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    $user_id = $_POST['user_id'];
    $comment_id = $_POST['comment_id'];

    // Perform any necessary processing



    $sql="INSERT INTO under_review_comment_like_dislike (user_id, comment_id)
    VALUES ('$user_id', '$comment_id')";
    $query=mysqli_query($conn,$sql);

} else {
    // Handle other request methods (GET, etc.) if needed
    echo 'Invalid request method.';
}
?>