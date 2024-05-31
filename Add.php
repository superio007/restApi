<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest API</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<?php
    require_once "./config.php";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = test_input($_POST['name']);
        $phone = test_input($_POST['phone']);
        $remark = test_input($_POST['remark']);
        $status = test_input($_POST['status']);
        $client = test_input($_POST['client']);
        $query = "INSERT INTO `user_info`(`client_name`, `phone`,`client_id`, `type_of_remark`, `status`) VALUES ('$name','$phone','$client','$remark','$status')";
        mysqli_query($con, $query);
        // Redirect to the same page after inserting data
        header("Location: read.php");
      }
?>
<body>
    <nav class="navbar navbar-expand-lg bg-primary" style="color:white; display:flex; gap:25px; padding-left:25px; align-items:center;  height:55px;">
        <div >
            <a class="navbar-brand" href="./read.php">CRUD</a>
        </div>
        <div >
            <a class="navbar-brand" href="./Add.php">Add</a>
        </div>
        <div >
            <a class="navbar-brand" href="./update.php">Update</a>
        </div>
        <div >
            <a class="navbar-brand" href="./delete.php">Delete</a>
        </div>
    </nav>
    <h1 class="my-4 text-center">Welecome to CRUD</h1>
    <div class="d-flex justify-content-center">
            <form class="w-25" action="" method="post">
                <div class="form-group">
                    <label for="name">Enter your name:</label>
                    <input type="text" class="form-control mb-2" name="name" placeholder="Enter your name" id="name" placeholder="Enter your name:">
                </div>
                <div class="form-group">
                    <label for="phone">Enter your phone no:</label>
                    <input type="text" class="form-control mb-2" name="phone" placeholder="Enter your phone no" id="phone">
                </div>
                <div class="form-group">
                    <label for="client">Enter your client id:</label>
                    <input type="text" class="form-control mb-2" name="client" placeholder="Enter your phone no" id="client">
                </div>
                <div class="form-group">
                    <label for="phone">Enter your type of remark:</label>
                    <input type="text" class="form-control mb-2" name="remark" placeholder="Enter your type of remark" id="remark">
                </div>
                <div class="form-group">
                    <label for="phone">Enter your status:</label>
                    <input type="text" class="form-control mb-2" name="status" placeholder="Enter your status" id="status">
                </div>
                <button type="submit" class="text-white bg-primary mt-2" >Add details</button>
            </form>
        </div>
</body>
</html>