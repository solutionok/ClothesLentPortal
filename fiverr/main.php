<?php 
include("header.php");

if(isset($_POST) && !empty($_POST))
{
  $rattings = new rattings();
  $result = $rattings->add($_POST['rating'], $_POST['username'], $_POST['product']);
  if($result)
    $success = "New rattings have been added.";
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

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}








.rating2 { 
  border: none;
  float: left;
}

.rating2 > input { display: none; } 
.rating2 > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating2 > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating2 > label { 
  color: #ddd; 
 float: right; 
}





.rating3 { 
  border: none;
  float: left;
}

.rating3 > input { display: none; } 
.rating3 > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating3 > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating3 > label { 
  color: #ddd; 
 float: right; 
}



.rating4 { 
  border: none;
  float: left;
}

.rating4 > input { display: none; } 
.rating4 > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating4 > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating4 > label { 
  color: #ddd; 
 float: right; 
}




.rating5 { 
  border: none;
  float: left;
}

.rating5 > input { display: none; } 
.rating5 > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating5 > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating5 > label { 
  color: #ddd; 
 float: right; 
}



.rating6 { 
  border: none;
  float: left;
}

.rating6 > input { display: none; } 
.rating6 > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating6 > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating6 > label { 
  color: #ddd; 
 float: right; 
}


.rating7 { 
  border: none;
  float: left;
}

.rating7 > input { display: none; } 
.rating7 > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating7 > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating7 > label { 
  color: #ddd; 
 float: right; 
}



.rating8 { 
  border: none;
  float: left;
}

.rating8 > input { display: none; } 
.rating8 > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating8 > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating8 > label { 
  color: #ddd; 
 float: right; 
}
/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

.rating2 > input:checked ~ label, /* show gold star when clicked */
.rating2:not(:checked) > label:hover, /* hover current star */
.rating2:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating2 > input:checked + label:hover, /* hover current star when changing rating */
.rating2 > input:checked ~ label:hover,
.rating2 > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating2 > input:checked ~ label:hover ~ label { color: #FFED85;  }


.rating3 > input:checked ~ label, /* show gold star when clicked */
.rating3:not(:checked) > label:hover, /* hover current star */
.rating3:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating3 > input:checked + label:hover, /* hover current star when changing rating */
.rating3 > input:checked ~ label:hover,
.rating3 > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating3 > input:checked ~ label:hover ~ label { color: #FFED85;  }

.rating4 > input:checked ~ label, /* show gold star when clicked */
.rating4:not(:checked) > label:hover, /* hover current star */
.rating4:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating4 > input:checked + label:hover, /* hover current star when changing rating */
.rating4 > input:checked ~ label:hover,
.rating4 > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating4 > input:checked ~ label:hover ~ label { color: #FFED85;  }

.rating5 > input:checked ~ label, /* show gold star when clicked */
.rating5:not(:checked) > label:hover, /* hover current star */
.rating5:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating5 > input:checked + label:hover, /* hover current star when changing rating */
.rating5 > input:checked ~ label:hover,
.rating5 > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating5 > input:checked ~ label:hover ~ label { color: #FFED85;  }

.rating6 > input:checked ~ label, /* show gold star when clicked */
.rating6:not(:checked) > label:hover, /* hover current star */
.rating6:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating6 > input:checked + label:hover, /* hover current star when changing rating */
.rating6 > input:checked ~ label:hover,
.rating6 > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating6 > input:checked ~ label:hover ~ label { color: #FFED85;  }

.rating7 > input:checked ~ label, /* show gold star when clicked */
.rating7:not(:checked) > label:hover, /* hover current star */
.rating7:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating7 > input:checked + label:hover, /* hover current star when changing rating */
.rating7 > input:checked ~ label:hover,
.rating7 > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating7 > input:checked ~ label:hover ~ label { color: #FFED85;  }

.rating8 > input:checked ~ label, /* show gold star when clicked */
.rating8:not(:checked) > label:hover, /* hover current star */
.rating8:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating8 > input:checked + label:hover, /* hover current star when changing rating */
.rating8 > input:checked ~ label:hover,
.rating8 > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating8 > input:checked ~ label:hover ~ label { color: #FFED85;  } </style>
	</head>
		<body>
  
    <?php if(isset($success)) echo "<h2>".$success."</h2>"; ?>
  
		 <div class="form-group"  class="acidjs-rating-stars">
                    <label>Reviews</label>
                    <div class="select">
					<table>
			<tr>				<td>Delivery</td><td>
			<form method="post">			
					 
<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset>
	</td></tr>	<tr>	
					<td>Time</td><td> <fieldset class="rating2">
    <input type="radio" id="star5" name="rating2" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating2" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating2" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating2" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating2" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating2" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating2" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating2" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating2" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating2" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></td></tr>	<tr>	
					<td>Cleanliness</td><td> <fieldset class="rating3">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></td></tr>	<tr>	
					<td>Accuracy</td><td> <fieldset class="rating4">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></td></tr>	<tr>	
					<td>communication</td><td><fieldset class="rating5">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></td></tr>	<tr>	
					<td>Quality</td><td> <fieldset class="rating6">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></td></tr>	<tr>	
					<td>Condition</td><td><fieldset class="rating7">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></td></tr>	<tr>	
					<td>Overall Experiene</td><td> <fieldset class="rating8">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></td></tr>
					</table>

                    </div>
                </div>


      <input type="text" name="username" placeholder="Username" > 
      <input type="text" name="product" placeholder="product" > 

      <input type="submit" name="submit" value="Submit">


    </form>
       

		</body>
</html>