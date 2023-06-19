<?php
include_once("../connection.php");

// Check if the review ID is provided in the query parameter
if (isset($_GET['id'])) {
    $reviewId = $_GET['id'];

    // Delete the review from the database
    $sql = "DELETE FROM review WHERE id = '$reviewId'";
    if (mysqli_query($link, $sql)) {
        // Deletion successful
        echo "Review deleted successfully.";
        header("Location: browse.php");
    } else {
        // Error occurred during deletion
        echo "Error deleting review: " . mysqli_error($link);
    }
} else {
    // If the review ID is not provided, handle it as desired (e.g., redirect to an error page)
    echo "Review ID not provided.";
}

mysqli_close($link);
?>
