<!-- @format -->

<?Php

$insert = false;
$update = false;
$delete = false;
// conection too data base 
$conn = mysqli_connect("localhost", "root", "", "note");

if (!$conn) {
  die("Error Not Conecting" . mysqli_connect_error());
}
;
if (isset($_GET['delete'])) {
  $Sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `notes`.`Sno` = '{$Sno}'";
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['snoEdit'])) {
    $Sno = $_POST["snoEdit"];
    $Title = $_POST['titleEdit'];
    $Description = $_POST['descriptionEdit'];
    $sqlq = "UPDATE `notes` SET `Title` = '{$Title}', `Description` = '{$Description}' WHERE `notes`.`Sno` = {$Sno}; ";
    $result = mysqli_query($conn, $sqlq);

    if ($result) {
      $update = true;
    } else {
      echo "We could not update the record successfully";
    }

  } else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $title = $_POST['title'];
      $description = $_POST['description'];


      $sqlq = "INSERT INTO `notes` ( `Title`, `Description`) VALUES ( '$title', '$description')";
      $sub = mysqli_query($conn, $sqlq);

      if ($sub) {
        $insert = true;
      } else {
        echo "Record note submit" . mysqli_error($conn);
        ;
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Php CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Edit this Note</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form accept="" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label for="title" class="form-label">Note title</label>
              <input type="text" class="form-control" id="titleEdit" aria-describedby="emailHelp" name="titleEdit" />
            </div>
            <div class="mb-3">Edit
              <label for="dsc" class="form-label">Note description</label>
              <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="descriptionEdit"
                  name="descriptionEdit"></textarea>
                <label for="floatingTextarea"></label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Update note</button>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Php CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Contact us</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">
            Search
          </button>
        </form>
      </div>
    </div>
  </nav>

  <?php
  if ($insert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong> Success!  </strong>  Record submit successfully 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>
  <?php
  if ($delete) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Danger!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

  <div class="container my-4">
    <h3>Add a note</h3>
    <form accept="" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Note title</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" required />
      </div>
      <div class="mb-3">
        <label for="dsc" class="form-label">Note description</label>
        <div class="form-floating">
          <textarea class="form-control" id="description" name="description" required></textarea>
          <label for="floatingTextarea"></label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Add note</button>
    </form>
  </div>

  <div class="container my-4">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `notes`";
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          // echo $row['Sno'];
          // echo "<br>";
          $sno = $sno + 1;

          echo "<tr>
          <th scope='row'>" . $sno . "</th>
          <td> " . $row['Title'] . "</td>
          <td>" . $row['Description'] . "</td>
          <td> <button class='btn btn-primary btn-sm edit' id=" . $row['Sno'] . "> Edit</button> <button class='delete btn btn-sm btn-primary' id=" . $row['Sno'] . ">Delete</button> </td>
          </tr>";
        }
        ?>

      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <script>
    let table = new DataTable('#myTable');

  </script>

  <script>
    let edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((e) => {
      e.addEventListener("click", (e) => {

        let tr = e.target.parentNode.parentNode;
        let title = tr.getElementsByTagName('td')[0].innerText;
        let description = tr.getElementsByTagName('td')[1].innerText;

        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle')
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {

        sno = e.target.id;
        console.log(sno)

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `ind.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })

  </script>
</body>

</html>