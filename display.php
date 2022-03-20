<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Crud Display</title>
</head>

<body>

  <div class="container">
    <div class="alert alert-success" role="alert" style="margin: 0; padding:0;">
      <?php
      if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "Record Insart successfully";
      }   ?> </div>

    <div class="alert alert-danger" role="alert" style="margin: 0; padding:0;">
      <?php if (isset($_GET['delete']) && $_GET['delete'] == 1) {
        echo "Record delete successfully";
      }  ?>
    </div>

    <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add User</a> </button>

    <form action="search.php" method="GET" class="d-flex">
      <input type="text" class="form-control me-2" name="search" value="<?php if (isset($_GET['search'])) {
                                                                          echo $_GET['search'];
                                                                        } ?>">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">SL no</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Password</th>
          <th scope="col">Operation</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT * from `user`";
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $name = $row['name'];
          $email = $row['email'];
          $mobile = $row['mobile'];
          $password = $row['password'];
          echo '<tr>
      <th scope="row">' . $id . '</th>
      <td>' . $name . '</td>
      <td>' . $email . '</td>
      <td>' . $mobile . '</td>
      <td>' . $password . '</td>

      <td>
  <button class="btn btn-primary"> <a href="update.php?updateid=' . $id . '" text class="text-light">Update</a></button>
  <button class="btn btn-danger"> <a href="delete.php?deleteid=' . $id . '" text class="text-light">Delete</a></button>
    </td>

    </tr>';
        }
      }
      ?>





    </table>
  </div>
</body>

</html>