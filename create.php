<?php
require ('connect.php');
require ('authenticate.php');

$errorMessage = "";

// Check if the form is submitted via POST method
// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if title or contentBlog is empty
    if (empty($_POST['title']) || empty($_POST['contentBlog'])) {
        // Set error message
        $errorMessage = "Attention: Title and content are required!";
        // Validation error message in JS - following PDO requirement
        echo "<script>alert('$errorMessage');</script>";
    } else {
        // Sanitize user input to escape HTML entities and filter out dangerous characters.
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // No need to sanitize contentBlog since TinyMCE handles it

        // Build the parameterized SQL query
        $query = "INSERT INTO blog (title, contentBlog) VALUES (:title, :contentBlog)";
        $statement = $db->prepare($query);

        // Bind values to the parameters
        $statement->bindValue(':title', $title);
        $statement->bindValue(':contentBlog', $_POST['contentBlog']); // No need for additional sanitization

        // Execute the INSERT
        if ($statement->execute()) {
            // Success message if needed
        } else {
            // Display an error message in JS - following PDO requirement
            echo "<script>alert('Error creating the blog post.');</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src="https://cdn.tiny.cloud/1/6du07rligevytivn166k977b47vxvwi6jix3bpe6vaycy8t7/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Create New Post</title>
</head>

<body>
    <div class='wrapper'>
        <header>
            <a href="index.php"><img src="images/Nicole_Blog_Logo.png" alt="Logo" class="logo"></a>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
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

        <!-- Form to enter new post -->
        <form method="post" action="create.php">
            <label for="title">Title</label>
            <input id="title" name="title" placeholder="Type here...">
            <label for="contentBlog">Content</label>
            <textarea id="mytextarea" name="contentBlog" placeholder="Type here..."></textarea>
            <input type="submit" value="Create New Post">
        </form>

    </div>
</body>

</html>