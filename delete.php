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
$query = "SELECT * FROM `user_info` ";
$result = mysqli_query($con, $query);
$selected_client_id = null;
// Check if the form is submitted
if (isset($_POST['options'])) {
    // Get the selected client ID from the form
    $selected_client_id = $_POST['options'];
    
    // Query to fetch data based on the selected client ID
    $query = "SELECT * FROM `user_info` WHERE client_id = $selected_client_id";
    $result = mysqli_query($con, $query);
    // Fetch the data
    $res = mysqli_fetch_assoc($result);
}

// Check if delete button is clicked
if(isset($_POST['delete'])) {
    // Query to delete data based on the selected client ID
    $query = "DELETE FROM `user_info` WHERE client_id = $selected_client_id";
    mysqli_query($con, $query);
    
    // Redirect to the same page after deletion
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;

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
    <div id="delete-div2" style="display: grid;justify-content: center;">
        <div>
            <form method="post">
                <select id="select" name="options" style="width:246px; height: 48px;">
                    <option value="none" selected disabled hidden>Select Client id</option>
                    <?php
                    
                    // Iterate over the result set to populate the dropdown
                    foreach($result as $row): ?>
                        <option  value="<?php echo $row['client_id']; ?>"
                            >
                            <?php echo $row['client_id']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                </br>
                <button class="btn btn-primary my-3" type="submit">Fetch data</button>
            </form>
        </div>
        <?php
        // Check if data is fetched and available
            if (isset($res)) {
        ?>
        <form class="w-100" action="" method="post">
            <div class="form-group">
                <label for="name">Enter your name:</label>
                <input type="text" class="form-control mb-2" name="name" value="<?php echo $res['client_name']; ?>" placeholder="Enter your name" id="name">
            </div>
            <div class="form-group">
                <label for="phone">Enter your phone no:</label>
                <input type="text" class="form-control mb-2" name="phone" value="<?php echo $res['phone'];?>" placeholder="Enter your phone no" id="phone">
            </div>
            <div class="form-group">
                <label for="remark">Enter your type of remark:</label>
                <input type="text" class="form-control mb-2" name="remark" value="<?php echo $res['type_of_remark'] ;?>" placeholder="Enter your type of remark" id="remark">
            </div>
            <div class="form-group">
                <label for="status">Enter your status:</label>
                <input type="text" class="form-control mb-2" name="status" value="<?php echo $res['status'] ;?>" placeholder="Enter your status" id="status">
            </div>
            <button type="submit" name="delete" class="btn btn-primary mt-2" >Delete details</button>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>