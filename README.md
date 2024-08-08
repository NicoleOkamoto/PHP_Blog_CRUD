# Blog Application

This is a simple blog application written in PHP that allows users to create, read, update, and delete blog posts. The application serves as a basic content management system where users can manage their posts easily through a web interface.

![Blog Mockup](./PHP_blog_mockup.png)

## Features

- **Create:** Users can write and publish new blog posts.
- **Read:** Blog posts are displayed on the homepage, allowing users to view the content.
- **Update:** Users can edit existing blog posts to update content or title.
- **Delete:** Users can delete posts they no longer wish to keep.

## Input Sanitization and Validation

To ensure the security and integrity of the data, all user inputs are sanitized and validated:

- **Sanitization:** All inputs are sanitized using PHP's built-in functions to prevent malicious code injection.
- **Validation:** Inputs are validated to ensure they meet the required format, such as non-empty fields for the title and content of a post.

## Installation

To get the blog application running locally, follow these steps:

### 1. Clone the Repository

```bash
git clone https://github.com/NicoleOkamoto/PHP_Blog_CRUD.git
```

### 2. Navigate to the Project Directory:

```bash
Copy code
cd PHP_Blog_CRUD
```

### 3. Set Up Your Web Server:

Ensure your web server (e.g., Apache, Nginx) is set up to serve PHP files and point to the project directory.

### 4. Create the Database:

Create a MySQL database for the blog application.
Import the provided SQL file to set up the necessary tables.
Configure Database Connection:
Update the config.php file with your database credentials.

### 5. Run the Application:

Open your web browser and navigate to the application URL (e.g.,`http://localhost/PHP_Blog_CRUD`).

## Usage

- **Homepage:** View all published blog posts.
- **Create New Post:** Use the form to add a new blog post.
- **Edit Post:** Click on a post to edit its title or content.
- **Delete Post:** Remove a post from the blog.

## Contributing

If you would like to contribute to this project, please fork the repository and submit a pull request. Any contributions, such as bug fixes, feature enhancements, or code improvements, are welcome.
