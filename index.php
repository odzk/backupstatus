<?php
$directory = '/mnt/zaiko/apps/backup/app/';
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.DS_Store'));

$directory2 = '/mnt/zaiko/apps/backup/db/';
$scanned_directory2 = array_diff(scandir($directory2), array('..', '.', '.DS_Store'));

function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }
        return $bytes;
		}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Caster Zaiko Backup System Info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<div class="col-sm-6">
		<table class="table table-sm table-bordered table-hover mt-3 shadow">
		<tr class="d-flex text-center">
			<th class="col-sm-12">Full Application Backup</th>
		</tr>
		  <tr class="d-flex text-center thead-light">
		    <th class="col-4">Date Backup</th>
		    <th class="col-4">File Name</th>
		    <th class="col-4">File Size</th>
 		 </tr>
 		 <?php foreach ($scanned_directory as $key => $value) { 
		  $file_size = filesize($directory . $value);
		  $file_date = filemtime($directory . $value);
 		 	?>
 		 <tr class="d-flex text-center">
 		 	<td class="col-4"><?php echo date("F d Y g:i A", $file_date) ?></td>
		    <td class="col-4"><?php echo $value ?></td>
		    <td class="col-4"><?php echo formatSizeUnits($file_size) ?>	</td>
		  </tr>
		 <?php } ?>
		 </table>
	</div>

	<div class="col-sm-6">
		<table class="table table-sm table-bordered table-hover mt-3 shadow">
		<tr class="d-flex text-center">
			<th class="col-sm-12">Database Backup</th>
		</tr>
		  <tr class="d-flex text-center thead-light">
		    <th class="col-4">Date Backup</th>
		    <th class="col-4">File Name</th>
		    <th class="col-4">File Size</th>
 		 </tr>
  		 <?php foreach ($scanned_directory2 as $key => $value) { 
		  $file_size2 = filesize($directory2 . $value);
		  $file_date2 = filemtime($directory2 . $value);
 		 	?>
 		 <tr class="d-flex text-center">
 		 	<td class="col-4"><?php echo date("F d Y g:i A", $file_date2) ?></td>
		    <td class="col-4"><?php echo $value ?></td>
		    <td class="col-4"><?php echo formatSizeUnits($file_size2) ?></td>
		  </tr>
		 <?php } ?>
		 </table>
	</div>

	</div>
</div>

</body>
</html>