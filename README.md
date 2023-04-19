# review-lesson PHP-PHP-CRUD-with-PostgreSQL-Database

CRUD (Create, Read, Update, Delete) is a fundamental concept in database management and refers to the four basic functions that can be performed on database records. In PHP, CRUD operations are widely used to manage data in databases, and PostgreSQL is one of the most popular open-source relational database management systems that is often used with PHP.

To perform CRUD operations in PHP with PostgreSQL, you first need to establish a connection to the database using the appropriate credentials. Then, you can use SQL commands to perform operations such as creating a new record, reading data from an existing record, updating a record, or deleting a record from the database.

PHP provides several libraries and extensions for working with PostgreSQL databases, including PDO (PHP Data Objects) and pgSQL. These libraries offer various functions for executing SQL queries, processing results, and handling errors.

By using CRUD operations with PostgreSQL in PHP, you can easily manage data in your web applications, create, retrieve, update, and delete records in your database, and build dynamic and interactive web pages that are responsive to user actions.


## Features

The application includes the following features:
+ Create: Users can add new data to the database by filling out a form and submitting it.
+ Read: Users can view existing data in the database by selecting it from a list or searching for it using a search bar.
+ Update: Users can edit existing data in the database by selecting it from a list, making changes, and saving the changes.
+ Delete: Users can delete existing data from the database by selecting it from a list and confirming the deletion.

## Technologies Used

The application was built using the following technologies:
 + PHP
 + PostgreSQL
 + HTML/CSS
 + Bootstrap 5

## How to Use

To use the application, follow these steps:

1.  Set up a MySQL database with the necessary tables and fields for the data you want to manage.
2.  Clone or download the application code from GitHub.
3.  Configure the database connection settings in the `config.php` file.
4.  Navigate to the `index.php` file in your browser to start using the application.

##  Code Examples

Here are some examples of code snippets from the application:
### Creating a new user record in the database

```
$sql  =  "INSERT INTO users (name, email, phone, address)".
		" VALUES ('$name', '$email', '$phone', '$address')";
$result  =  pg_query($conn,  $sql);
```

### Updating user an existing record in the database

```
$sql  =  "SELECT  *  FROM users WHERE id =  $id";
$result  =  $result  =  pg_query($conn,  $sql);
``` 

### Deleting user a record from the database

```
$sql  =  "DELETE  FROM users WHERE id = '$id'";
$conn  =  pg_query($conn,  $sql);
```

## Conclusion
This CRUD PHP application provides a basic framework for managing data in a database. By customizing the code and database structure, you can use it to manage any type of data you need.
