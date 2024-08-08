<?php
require ('connect.php');
require ('authenticate.php');

// Retrieve and sanitize the ID parameter from GET
$id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : null;

$errorMessage = "";

if ($id === false || $id === null) {

    // If ID is not an integer or null, redirect to home page
    header("Location: index.php");
    exit;
}

// Fetch the blog post corresponding to the ID
$query = "SELECT * FROM blog WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$post = $statement->fetch();

// Check if the blog post exists
if (!$post) {

    // If post not found, display JS alert
    $errorMessage = "Blog Post not found!";
    // Display validation error message in JS
    echo "<script>alert('$errorMessage'); window.location='index.php';</script>";
    exit;
}

// Handle form submission for deleting the blog post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && isset($_POST['id'])) {

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM blog WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    // Redirect to home page after deleting.
    header("Location: index.php");
    exit;
}

// Handle form submission for editing the blog post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['title']) || empty($_POST['contentBlog'])) {
        // Set error message
        $errorMessage = "Attention: Title and content are required!";
        // Validation error message in JS - following PDO requirement
        echo "<script>alert('$errorMessage');</script>";
    } else {
        // Sanitize user input for edited content
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contentBlog = filter_input(INPUT_POST, 'contentBlog', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        // Update the blog post in the database
        $query = "UPDATE blog SET title = :title, contentBlog = :contentBlog WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':contentBlog', $_POST['contentBlog']);///heeereeeee
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        // Redirect after update.
        header("Location: post.php?id={$id}");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src="https://cdn.tiny.cloud/1/6du07rligevytivn166k977b47vxvwi6jix3bpe6vaycy8t7/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Edit Blog Post!</title>
</head>

<body>

    <div class='wrapper'>
        <header>
            <a href="index.php"><img src="images/Nicole_Blog_Logo.png" alt="Logo" class="logo"></a>
            <nav>
                <ul>
                    <!-- New Post / Home Page button in the Nav Bar -->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="create.php">New Post</a></li>
                </ul>
            </nav>
        </header>

        <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        license_key: 'gpl|<6du07rligevytivn166k977b47vxvwi6jix3bpe6vaycy8t7>'
      });
    </script>

        <!-- Display form with title and content being edited -->
        <?php if ($post): ?>
            <form method="post">
                <label for="title">Title</label>
                <input id="title" name="title" value="<?= $post['title'] ?>">
                <label for="contentBlog">Content</label>
                <textarea id="mytextarea" name="contentBlog"><?= htmlspecialchars($post['contentBlog']) ?></textarea>

                <!-- Display buttons Edit and Submit Update -->
                <div class="buttons-container">
                    <input type="submit" value="Submit Update">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <!-- Confirm if user wants to delete the post -->
                    <input type="submit" name="delete" value="Delete Post"
                        onclick="return confirm('Are you sure you wish to delete this post?')">
                </div>
            </form>
        <?php endif ?>

    </div>

</body>

</html>