<!-- @format -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add</title>
  <link rel="stylesheet" href="mystyle.css" />
</head>

<body>
  <?php
  include "Header.php";
  ?>
  <form action="data.php" method="post">
    <div>
      <label for="Name">Name</label>
      <input type="text" name="name" id="Name" autocomplete="off" placeholder="Enter Your Name" required />
    </div>
    <div>
      <label for="Phone">Phone No</label>
      <input type="text" name="phone" id="Phone" autocomplete="off" placeholder="Enter Your Phone No" required />
    </div>
    <div>
      <label for="Email">Email Id</label>
      <input type="email" name="email" id="Email" autocomplete="off" placeholder="Enter Your Email id" required />
    </div>
    <div>
      <label for="course">Select Course</label>
      <select name="course" id="course" required>
        <option value="" selected disabled>Select</option>
        <option value="BA">BA</option>
        <option value="BCOM">BCOM</option>
        <option value="BSC">BSC</option>
        <option value="BTECH">BTECH</option>
        <option value="MSC">MSC</option>
      </select>
    </div>

    <button type="submit">Submit</button>
  </form>
</body>

</html>