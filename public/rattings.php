<?php 
include("header.php");

$rattings = new rattings();
$data = $rattings->all();
?>


<html>
	<head>
		<title>
		
		</title>
		
<style class="cp-pen-styles">
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

</style>
	</head>
<body>

<style type="text/css">
	tr, th, td{
		padding: 5px;
    border: 1px solid;
	}
</style>

<table style="margin: 30px;">
  <tr>
  	<th>#</th>
    <th>Username</th>
    <th>Product</th>
    <th>Delivery Ratings</th>
    <th>Time Ratings</th>
    <th>Cleanless Ratings</th>
    <th>Accuracy Ratings</th>
    <th>Communication Ratings</th>
    <th>Quality Ratings</th>
    <th>Condition Ratings</th>
    <th>Overall Ratings</th>
  </tr>
  <tr>

  	<?php
  	$i = 1;
  	foreach ($data as $d) {?>
  	<tr>
  		<td><?php echo $i; ?></td>
	    <td><?php echo $d['username'] ?> star</td>
	    <td><?php echo $d['product'] ?> star</td>
      <td><?php echo $d['delivery_rat'] ?> star</td>
      <td><?php echo $d['time_rat'] ?> star</td>
      <td><?php echo $d['cleanliness_rat'] ?> star</td>
      <td><?php echo $d['accuracy_rat'] ?> star</td>
      <td><?php echo $d['communication_rat'] ?> star</td>
      <td><?php echo $d['quality_rat'] ?> star</td>
      <td><?php echo $d['condition_rat'] ?> star</td>
	    <td><?php echo $d['overall_rat'] ?> star</td>
	</tr>
  	<?php $i++;  }
  	?>
  	
  </tr>
</table>


</body>

</html>