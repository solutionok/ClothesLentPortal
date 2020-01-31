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
@include('user-interface.includes.header')
<style type="text/css">
	tr, th, td{
		padding: 5px;
	}
</style>

<table style="margin: 30px;">
  <tr>
  	<th>#</th>
    <th>Username</th>
    <th>Product</th>
    <th>Ratings</th>
  </tr>
  <tr>

  	<?php
  	$i = 1;
  	foreach ($data as $d) {?>
  	<tr>
  		<td><?php echo $i; ?></td>
	    <td><?php echo $d['username'] ?></td>
	    <td><?php echo $d['product'] ?></td>
	    <td>
	    	<?php echo $d['overall_rat'] ?>
    	</td>
	</tr>
  	<?php $i++;  }
  	?>
  	
  </tr>
</table>

@include('user-interface.includes.footer')
</body>

</html>