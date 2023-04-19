<?php

$host = "localhost";
$port = "5050";
$dbname = "wrokshop-php";
$user = "postgres";
$password = "1234";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {
   // GET method : show the data of the client

   if (! isset($_GET["id"])) {
    // header("Location: /code/php/test/index.php");
     cconsole_log("no id found, handle the error as needed");
    
    // exit;
   }


   $id = $_GET["id"];

   //read the row of the selected cleint from database tabele
   $sql = "SELECT * FROM users WHERE id = $id";
   $result = $result = pg_query($conn, $sql);
//    $row = $result->pg_fetch_assoc();

if (!$result) {
    echo "Error: " . pg_last_error();
} else {
    $row = pg_fetch_array($result, null, PGSQL_ASSOC);
    if (!$row) {
        // no row found, handle the error as needed
    } else {
        // read the data from $row and use it as needed
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
    }
}



    

} else {
     // post method : Update the data of the client
    $id = pg_escape_string($_POST['id']);
    $name = pg_escape_string($_POST['name']);
    $email = pg_escape_string($_POST['email']);
    $phone = pg_escape_string($_POST['phone']);
    $address = pg_escape_string($_POST['address']);

    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address) ) {
            $errorMessage = "Add the field are required";
            break;
        }

        $result = "UPDATE users ".
       "SET name = '$name', email = '$email', phone = '$phone', address = '$address' ".
       "WHERE id = '$id'";

        $result = pg_query($conn, $result);

        if (!$result) {
            $errorMessage = "Invalid database query". $conn->error;
            break;
        }

        $successMessage = "Client update successfully";

    }while (false);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title>Work Shop Edit</title>
</head>

<body>
    <div class="contriner my-5">
        <div class="container my-5">
            <h2>New Client</h2>
            <?php
        if ( !empty($errorMessage )) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert' >
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
            </div>
            ";
        }
        ?>

            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                    </div>
                </div>



                <?php
                if (!empty($successMessage)) {
                    echo"
                    <div class='row mb-3'> 
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            </div>
                        </div>
                    </div>
                    ";

                }
                
                ?>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button class="btn btn-primary" type="sumbit">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a href="/code/php/test/index.php" class="btn btn-outline-primary" role="button">Canecl</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>

</html>