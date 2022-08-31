<?php
include 'connect.php';

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/datatables.min.css" />
  <title>CRUD OPERATIONS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>


  <div class="container">
    <button type="submit" class="btn btn-primary my-5"><a href="user.php" class="text-light" name="submit">Add User</a></button>
    <a href="logout.php" class="btn btn-primary my-15">Logout</a>
    <table id="datatable" class="table">
      <thead>
        <tr>
          <th scope="col">Serial No.</th>
      <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Password</th>
          <?php
          $role = $_SESSION['username'];

          $sql = "select role_as from crud where email= '$role'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          // var_dump( $row['role_as']);
          // exit;
          if ($row['role_as'] == '1') {
            echo ' <th scope="col" >Operations</th>';
          } else {
            echo '<th scope="col" style="display:none;">Operations</th>';
          }
          ?>


        </tr>
      </thead>
      <tbody>
        <?php
        $sql = " select * from crud";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          if ($row['role_as'] == '1') {
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
       <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
       <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
</td> 
</tr>';
}}
else {
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
<td>' . $password . '</td>';
    }
  }
}
        ?>

      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
  <script type="text/javascript">
    $('#datatable').DataTable({});
  </script>
  <!-- pop up -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['status']; ?> ",
        //text: "You clicked the button!",
        icon: "<?php echo $_SESSION['status_code']; ?>",
        button: "Okay! Done",
      });
    </script>
  <?php
    unset($_SESSION['status']);
  }
  ?>


</body>

</html>