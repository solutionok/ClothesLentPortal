<?php 
include("header.php");

if(isset($_POST) && !empty($_POST))
{
  $rattings = new rattings();
  $result = $rattings->add($_POST['username'], 
    $_POST['product'],
    $_POST['rating'],
    $_POST['rating2'],
    $_POST['rating3'],
    $_POST['rating4'],
    $_POST['rating5'],
    $_POST['rating6'],
    $_POST['rating7'],
    $_POST['rating8']);
  if($result){
    $success = "New rattings have been added.";
    if(isset($_POST['callback']))
      header("Location: ".$_POST['callback']);
  }
}

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

input{
  display: block;
  margin: 10px;
}
</style>
	</head>
		<body>
  
    <?php if(isset($success)) echo "<h2>".$success."</h2>"; ?>
  
			<form method="post">			
        <h3>Give Ratings from 1 to 5</h3>
      <input type="text" name="rating" placeholder="Delivery" />
      <input type="text" name="rating2" placeholder="Time" />
      <input type="text" name="rating3" placeholder="Cleanliness" />
      <input type="text" name="rating4" placeholder="Accuracy" />
      <input type="text" name="rating5" placeholder="communication" />
      <input type="text" name="rating6" placeholder="Quality" />
      <input type="text" name="rating7" placeholder="Condition" />
      <input type="text" name="rating8" placeholder="Overall Experiene" />
      <h3>Enter Usernmae</h3>
      <input type="text" name="username" placeholder="Username" > 
      <h3>Enter Product Name</h3>
      <input type="text" name="product" placeholder="product" > 

      <input type="submit" name="submit" value="Submit">


    </form>
       

		</body>
</html>