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
    <title>Work Shop 1</title>
</head>

<body>
    <div class="container my-5">
        <h2> Lust of Client</h2>
        <a class="btn btn-primary" href="/code/php/test/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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

                // read all row from database table
                $sql = "SELECT * FROM users";
                $result = pg_query($conn, $sql);

                if (!$result) {
                    echo "Error: " . pg_last_error();
                } 

                //read data of each row
                while($row = pg_fetch_assoc($result)) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[create_at]</td>
                    <td>
                        <a  class='btn btn-primary btn-sm' href='/code/php/test/edit.php?id=$row[id]'>Edite</a>
                        <a  class='btn btn-danger btn-sm' href='/code/php/test/delete.php?id=$row[id]'>Delete</a>
                    </td>
                    ";
                }
                
                // close the database connection
                pg_close($conn);

                ?>
                
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>