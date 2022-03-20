<?php include 'connect.php'; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>Crud Display</title>
</head>

<body>
  <div class="container  my-5">

    <form action="" method="GET" class="d-flex my-5">
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
        </tr>
      </thead>
      <?php
      if (isset($_GET['search'])) {
        $filtervalues = $_GET['search'];
        $query = "SELECT * from `user` where CONCAT(name,email) LIKE '%$filtervalues%'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $item) {
      ?>
            <tr>
              <td><?= $item['id']; ?></td>
              <td><?= $item['name']; ?></td>
              <td><?= $item['email']; ?></td>
              <td><?= $item['mobile']; ?></td>
              <td><?= $item['password']; ?></td>
            </tr>
          <?php

          }
        } else {

          ?>
          <tr>
            <td colspan="5">No Record Found</td>
          </tr>
      <?php
        }
      }
      ?>



    </table>
  </div>

</body>