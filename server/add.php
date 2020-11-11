<?php
require '../config.php';
require '../db.php';

$serverName = $_POST['name'];
$serverLocation = $_POST['location'];
$serverType = $_POST['type'];
$serverAddress = $_POST['address'];

if ($serverName && $serverLocation && $serverType && $serverAddress) {
  try {
    $statement = $connection->prepare(
      "INSERT INTO `servers` (`id`, `name`, `type`, `location`, `address`) VALUES (NULL, :name, :type, :location, :address)"
    );

    $statement->execute([
      ':name' => $serverName,
      ':type' => $serverType,
      ':location' => $serverLocation,
      ':address' => $serverAddress,
    ]);

    $result = $statement->fetch();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title><?php echo constant('TITLE'); ?></title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>
<?php include "../components/header.php"; ?>
<div id="modify" class="container" align="center">
<form class="needs-validation" novalidate action="" method="POST">
 
<?php if ($statement) {
  echo "<h5 class='mb-5'><svg width='1.5em' height='1.5em' viewBox='0 0 16 16' class='bi bi-check-circle mb-1' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
    <path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
    <path fill-rule='evenodd' d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z'/>
    </svg> Server added successfully</h5>";
} ?>

  <div class='col-md-4 mb-3'>
   <label for='serverNameValidation'>Server Name</label>
   <input type='text' class='form-control' id='serverNameValidation' name="name" placeholder='Server name'required>
   <div class='valid-feedback'>
     Looks good!
   </div>
 </div>

 <div class='col-md-4 mb-3'>
   <label for='serverLocationValidation'>Server Location</label>
   <input type='text' class='form-control' id='serverLocationValidation' name="location" placeholder='Server location' required>
   <div class='valid-feedback'>
     Looks good!
   </div>
 </div>

 <div class='col-md-4 mb-3'>
   <label for='serverAddressValidation'>Server Address</label>
   <input type='text' class='form-control' id='serverAddressValidation' name="address" placeholder='127.0.0.1' required>
   <div class='valid-feedback'>
     Looks good!
   </div>
 </div>

 <div class='col-md-4 mb-3'>
   <div class='form-group'>
 <label for='serverTypeSelect'>Server Type</label>
 <select class='form-control mb-5' id='serverTypeSelect' name="type">
   <option>VPS</option>
   <option>Dedicated</option>
 </select>
</div>
   <div class='valid-feedback'>
     Looks good!
   </div>
 </div>


    <a class="btn btn-light" type="submit" href='../'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
</svg> Go back</a>
  <button class="btn btn-light" type="submit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
</svg> Add Server</button>
 
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</div>
<?php include "../components/footer.php"; ?>
    
</body>
</html>