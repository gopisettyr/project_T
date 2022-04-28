<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="refresh" content="60">
	<title>Project T</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="card text-center">
<div class="card-body">
<div class="row">
<div class="col-md-6"> 
<?php
include 'grouped-bar.php';
?>
</div>
<div class="col-md-3"> 
<?php echo "<br><br><br><br>"; ?>
<select class="form-select" id="expirydropdown">
  <option value="default">Expiry Date</option>
  <option value="default">Expiry Date</option>
  <option value="default">Expiry Date</option>
</select>
<?php
echo "<br><br><br><br>";
include 'basic-column.php';
//include 'banknifty-column.php';
?>
</div>
<div class="col-md-0">
<?php
//include 'grouped-bar-nifty.php';
?>
</div>
</div>
<div>

</div>
</div>
</div>
</body>	
</html>      
