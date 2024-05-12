# Chapter 1: Project Setup

In Chapter 1, "Project Setup," we will cover the initial setup and folder structure for our PHP Full Stack Web Application. This includes organizing files and directories, setting up the necessary configurations, and preparing the project for development.

## 1 Folder Structure Overview

Here's an overview of the basic folder structure for our project:

1. `index.php:` The main entry point of our web application. This file will serve as the landing page for users and will contain the initial HTML structure and logic to render the page.

2. `/public:`

`/css:` Directory to store CSS files for styling the application.
`/images:` Directory to store images and other media files used in the application.

3. `/includes:` Directory to store PHP files that contain reusable code snippets, such as config and db files.

4. `/common:` Directory to store common PHP functions, classes, or configuration files that are used throughout the application like header and footer.

5. `/action:` Directory to store PHP files that handle specific actions or requests from the user, such as user authentication, form submissions, or database interactions.



## 2 Initializing the Project

Now, let's initialize the project and create some initial files:

1. Create an index.php file in the root directory (/) to serve as the main entry point of the application.

2. Create style.css and script.js files in the /public/css and /public/js directories, respectively, to store CSS styles and JavaScript code for the application.

3. Create a header.php and footer.php file in the /includes directory to contain the header and footer HTML code, respectively. These files will be included in every page of the application for consistency.

4. Create a config.php file in the /common directory to store common configuration settings, such as database connection details or global variables.

