<!DOCTYPE html>
<html>

<head>
    <title>Review Page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/review.css?<?=filemtime("../css/review.css")?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>

<body>
<?php 
include_once("../headers/alt_header.php") ;
include_once("../connection.php");
include_once("../session.php");
?>
    <main id="main">
        <?php
        
        function getAuthorName($authorId)
        {
            $conn = mysqli_connect("localhost", "root", "", "tripvice");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Query the database to fetch the author's name
            $sql = "SELECT name FROM user WHERE id = $authorId";
            $result = mysqli_query($conn, $sql);
                
            // Check if the query was successful
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $authorName = $row['name'];
                mysqli_close($conn);
                return $authorName;
            }
            mysqli_close($conn);
            return "Unknown";
        }

        function getReviewData($reviewId)
        {
            $conn = mysqli_connect("localhost", "root", "", "tripvice");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Query the database to fetch the review details
            $sql = "SELECT * FROM review WHERE id = $reviewId";
            $result = mysqli_query($conn, $sql);

            // Check if a review with the given ID exists
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $reviewTitle = $row['title'];
                $reviewType = $row['type'];
                $likeCount = $row['likes'];
                $dislikeCount = $row['dislikes'];
                $reviewPhoto = $row['filename'];
                $reviewText = $row['description'];
                $authorId = $row['user_id'];

                // Fetch the comments for the review
                $commentSql = "SELECT * FROM comment WHERE review_id = $reviewId";
                $commentResult = mysqli_query($conn, $commentSql);
                $comments = [];
                while ($commentRow = mysqli_fetch_assoc($commentResult)) {
                    $comments[] = [
                        'text' => $commentRow['comment'],
                        //'rating' => $commentRow['rating'],
                        'author' => $commentRow['author_id']
                    ];
                }

                mysqli_free_result($commentResult);

                mysqli_close($conn);

                // Return an array containing the review data
                return [
                    'reviewTitle' => $reviewTitle,
                    'reviewType' => $reviewType,
                    'likeCount' => $likeCount,
                    'dislikeCount' => $dislikeCount,
                    'reviewPhoto' => $reviewPhoto,
                    'reviewText' => $reviewText,
                    'comments' => $comments,
                    'authorId' => $authorId
                ];
            } else {
                mysqli_close($conn);
                return null;
            }
        }

        // Check if the review ID is present in the URL
        if (isset($_GET['id'])) {
            $reviewId = $_GET['id'];

            // Call the getReviewData() function to fetch the review data
            $reviewData = getReviewData($reviewId);

            // Check if review data exists
            if ($reviewData) {
                // Extract the variables from the returned array
                extract($reviewData);
                ?>
                <h1>
                    <?php echo $reviewTitle; ?>
                </h1>
                <p>
                    <?php echo $reviewType; ?>
                </p>
                <div id="like-dislike-ratio">
                    <span id="like-count">
                        <?php echo $likeCount; ?>
                    </span>
                    <span>/</span>
                    <span id="dislike-count">
                        <?php echo $dislikeCount; ?>
                    </span>
                </div>
                <div id="photo-container">
                    <div class="arrow arrow-left">&#8249;</div>
                    <img src="../uploads/<?php echo $reviewPhoto; ?>" alt="Review Photo" id="review-photo" />
                    <div class="arrow arrow-right">&#8250;</div>
                </div>
                <p class="review-text">
                    <?php echo $reviewText; ?>
                </p>

                <h2 class="review-text">Were you satisfied with the review?</h2>
                <div id="rating-section">
                    <div id="comment-section">
                        <textarea id="comment" rows="4" cols="50" placeholder="Enter your comment"></textarea>
                    </div>
                </div>

                <div id="like-dislike-section">
                    <button id="like-button" class="rating-button">Like</button>
                    <button id="dislike-button" class="rating-button">Dislike</button>
                </div>
                <br />
                <button id="rating-button">Submit</button>

                <div id="comment-list">
                    <h3>Comments</h3>
                    <?php if ($comments && count($comments) > 0): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment">
                                <p class="comment-text">
                                    <?php echo $comment['text']; ?>
                                </p>
                                <p class="comment-author">-
                                    <?php echo getAuthorName($comment['author']); ?>
                                    <?php echo $comment['author']; ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No comments available.</p>
                    <?php endif; ?>
                    <?php
                    //Check if user_id == authorId
                    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $authorId) {
                        ?><br><br><p>Do you want to edit or delete your review?</p>
                        <p>Your id: <?php echo $_SESSION['user_id']; ?></p>
                        <p>Author id: <?php echo $authorId; ?></p>
                        <a href="../pages/update_review_page.php?id=<?php echo $reviewId;?>">Edit</a>
                        <a href="../pages/delete_review.php?id=<?php echo $reviewId;?>">Delete</a>
                        <?php
                    }
                    ?>
                    
                </div>

                <?php
            } else {
                echo "Review not found";
            }
        }
        ?>
    </main>
    <script src="review.js"></script>
</body>

</html>