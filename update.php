<?php
include 'connect.php';
$id = $_GET['updateid'];

$sql = "Select * from `user` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);



$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $sql = "UPDATE user SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id=$id ";
    // echo "<pre>"; print_r($sql); exit;
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:display.php');
        // echo "Update  successfully";
    } else {
        die(mysqli_error($con));
    }
}

// echo "<pre>"; print_r($name); exit;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Crud Oparetion</title>
</head>

<body>

    <div class="container">

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" autocomplete="off" value=<?php echo $email; ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" autocomplete="off" value=<?php echo $mobile; ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" autocomplete="off" value=<?php echo $password; ?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

</body>

</html>