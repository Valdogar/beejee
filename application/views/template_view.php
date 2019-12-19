<!DOCTYPE html>
<html lang="en">
<head>
<title>BeeJee</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/favicon.ico" rel="icon" type="image/x-icon" />
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<link href="/css/main.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

<!-- MDBootstrap Datatables  -->
<link href="css/addons/datatables.min.css" rel="stylesheet">
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>

</head>
<body>

<div class="topnav">
  <a href="/">Main</a>
  <a href="/login">Login</a>
  <?php 
  if(isset($data['admin']) && $data['admin']=='admin'){
    echo ' <a href="/admin/logout">Logout</a>';
  }
  ?>
  <a href="/task">Create Task</a>
</div>

<?php 
    if(isset($data['err'])){
        foreach($data['err'] as $err){
            echo $err.PHP_EOL;
        }
    }
    ?>

<?php include 'application/views/'.$content_view; ?>

<div class="footer">
  <p>Footer</p>
</div>
<script >
$(document).ready(function () {
  $('#table').DataTable();
  $('.dataTables_length').addClass('bs-select');
  }); 
</script>
</body>

</html>
