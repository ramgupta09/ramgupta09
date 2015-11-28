<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>The Educare Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="web/css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
<script src="web/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="web/js/jquery.flexslider.js" type="text/javascript"></script>
 <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 4,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
</head>
<body>
<div class="h-bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
		  	 <a href="index.html"><img src="web/images/logo.jpg"> </a>
		 </div>
	<div class="header-right">
	 	 <ul class="nav">
	        <li class="active"><a href="index.php" title="Home">Home</a></li>
	  		<li><a href="topnames.php">Find Top Names</a></li>
	  	    <li><a href="namepopularity.php">Name Popularity </a></li>
	  		<li><a href="contact.html">Contact</a></li>
      </ul>
	 </div>
	 <div class="clear"></div>
	</div>
</div>
</div>
<br /><br /><br />

<div class="cont_bg">
<div class="wrap">
<div class="content">
 <div class="main">
 	<h2>Find Top Popular Names Of the Year </h2>
    <br /><br /><br />
    <form method="POST">
     YEAR :   <select name="year" id="year" >
<option value="-1">---Select Year---</option>
<?php

require 'config.php';
$qry="select * from year";
$res=@mysql_query($qry) or die(mysql_error());
while($row=mysql_fetch_array($res))
{
    echo "<option value=$row[0]>$row[0]</option>";
}

?>
</select> <br /><br />
Gender: <input type="radio" name="gender" value="male" required="" /> Male <input type="radio" required="" value="female" name="gender"/> Female
<br />  <br />
                        Top Names: <input type="radio" required="" name="topname" value="5" /> 5 <input type="radio" required="" name="topname" value="20" /> 20 <input type="radio" name="topname" value="40" />40 <input type="radio" name="topname" value="80" /> 80 <input type="radio" required="" name="topname" value="100" /> 100

                                 <br /><br />      <input type="submit" name="find" value="Find"/>

</form>

<hr color=red />

<?php
if(isset($_POST['find']))
{
    //echo "helo";
    require 'config.php';
    $year= $_POST['year'];
    $gender= $_POST['gender'];
    $topname=$_POST['topname'];
    $table= $gender.'_'.$year;
    //echo $table;
    $qry="Select * from $table limit $topname ";
    $result=@mysql_query($qry) or die(mysql_error());
    echo "<h2 style='text-align: center; color: red;'> Top $topname $gender Name of Year $year</h2><br /><br />";
    
    //echo "<br />"."Sr No."."&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Name"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Popularity"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Rank";
    echo "<table align=center><tr><td>Sr No.</td><td>&nbsp &nbsp NAME</td><td>&nbsp&nbspno.Of births</td><td>&nbsp&nbsp</td></tr>";
    for($i=0;$i<$topname;$i++)
    {
        mysql_data_seek($result,$i);
        $row=mysql_fetch_array($result);
        $srno=$i+1;
        //echo "<br />".$srno."  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row[0]." &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  ".$row[1]." &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   ".$row[2];
        echo "<tr><td>$srno</td><td> &nbsp&nbsp $row[0]</td><td>&nbsp &nbsp $row[1]</td><td>&nbsp &nbsp </td></tr>";
    }
    //echo "<br />".$row[0][1]." ".$row[0][1]." ";
    echo "</table> <hr color=red />";
}

?>
   
 
 </div>
  </div>
 <div class="clear"></div>
 </div>
</div>
<br /><br /><br /><br />

<div class="f_bg">
<div class="wrap">
<div class="footer">
		<div class="f_logo">
			<a href=""><img src="web/images/logo.jpg" alt=""></a>
		<div class="copy">
			<p class="w3-link">© All Rights Reserved | Design by&nbsp; <a href=""> ABC </a></p>
 		</div>
 		</div>
		<div class="f_grid">
		<div class="social">
				<ul class="follow_icon">
						<li><a href="#" style="opacity: 1;">Get Updates Via</a></li>
					<li><a href="#" style="opacity: 1;"><img src="web/images/fb.png" alt=""></a></li>
					<li><a href="#" style="opacity: 1;"><img src="web/images/g+.png" alt=""></a></li>
					<li><a href="#" style="opacity: 1;"><img src="web/images/tw.png" alt=""></a></li>
					<li><a href="#" style="opacity: 1;"><img src="web/images/rss.png" alt=""></a></li>
				</ul>
			</div>
		</div>
		<div class="f_grid1">
			<div class="f_icon">
				<img src="web/images/f_icon.png" alt="" />
			</div>
			<div class="f_address">
				<p>500 Lorem Ipsum Dolor Sit,</p>
				<p>22-56-323 Lorem Ipsum Dolor Sit Sit Amet,</p>
				<p>Fax: (000) 000 00 00 0</p>
				<p>Email: <span>info@mycompany.com</span></p>
		  </div>
		</div>
		<div class="clear"></div>
</div>
</div>
</div>
</body>
</html>