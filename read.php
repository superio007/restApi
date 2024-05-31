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
$query = "SELECT * FROM user_info";
$results = mysqli_query($con, $query);
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
    <div>
            <table class="table table-hover text-center">
                <tr>
                    <th>Client Id</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>Type Of Remark</th>
                    <th>Status</th>
                </tr>
                <?php $val = 1; foreach($results as $res): ?>
                    <tr>
                        <td><?php echo $val ?></td>
                        <td><?php echo $res['client_name'] ?></td>
                        <td><?php echo $res['phone']?></td>
                        <td><?php echo $res['type_of_remark'] ?></td>
                        <td><?php echo $res['status'] ?></td>
                        <td><a class="btn bg-primary text-white" href="update.php?id=<?php echo $res['client_id'] ?>">Edit</a></td>
                        <td><a class="btn bg-danger text-white" href="redirect.php?id=<?php echo $res['client_id'] ?>">Delete</button></td>
                    </tr>
                    <?php $val++;?>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</body>
</html>