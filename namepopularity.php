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
    <form align=center method="post">
<pre>


                                        Year:       <select align=center name="year" id="year" required="required" onchange="ajax()">
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
</select>

                                        Name:   <input type="text" name="name"  list="name" placeholder="Name"/>
      <datalist id="name"> </datalist>  
                                        Gender: <input type="radio" required="" name="gender" value="male" /> Male <input type="radio" value="female" name="gender"/> Female

                                        <input type="submit" name="find" value="Get Popularity & Draw Graph"/>

</pre>
</form>

<hr color=red />
<fieldset  >
<legend></legend>


<?php
if(isset($_POST['find']))
{
    
    require 'config.php';
    $year= $_POST['year'];
    $gender= $_POST['gender'];
    $name=$_POST['name'];
    if($year==-1)
    {
        echo "<script> alert('ohhh!!! Please select Year') </script>";
    }
    else
    {
    echo "<h2 style='text-align: center; color: red;'>Your Name : $name &nbsp &nbsp &nbsp &nbsp Gender: $gender</h2>";
    echo "<h3 style='text-align: center; color: brown;'>Popularity is given by no of births </h3>";
    echo "<hr color=red />";
    
    $yeararr=array();
    $popularity=array();
    $rank=array();
     $i=0;
     
     //Array Created
     $temp=$year;
     for($year;$year<=2013;$year++)
    {
        $yeararr[$i]=$year;
        $table= $gender.'_'.$year;
    
    $qry="Select * from $table where Name='$name' ";
    $result=@mysql_query($qry) or die(mysql_error());
   
    if(mysql_num_rows($result)>0)
    {
        $row=mysql_fetch_array($result);
        $popularity[$i]=$row[1];
        $rank[$i]=$row[2];
    }
    else
    {        
        $rank[$i]=0;
        $popularity[$i]=0;
    }
    $i++;
    }
    //Graph Ploting
     session_start();
    $_SESSION['popularity']=$popularity;
    $_SESSION['year']=$yeararr;
    $_SESSION['name']=$name;

    echo "<br /><h2> Popularity Graph</h2><br /><br />";
    echo "<img src='graph.php' style='alignment-adjust: central; margin-left: 5%'/>";

     
     
    echo "<hr color=red />";
    echo "<br /><h2> Ranking Of Baby Name And No. of Births </h2><br /><br />";
    echo "<h3 >Year &nbsp No. Of Birth &nbsp Rank</h3>";
    $year=$temp;
    for($year;$year<=2013;$year++)
    {
       // $yeararr[$i]=$year;
    $table= $gender.'_'.$year;
    //echo $table;
    
    $qry="Select * from $table where Name='$name' ";
    $result=@mysql_query($qry) or die(mysql_error());
    //echo "<h2 style='text-align: center; color: red;'> Top $topname $gender Name of Year $year</h2>";
    //echo "<br />"."Sr No."."&nbsp"."Name"."   "."Popularity"."   "."Rank";
    if(mysql_num_rows($result)>0)
    {
        $row=mysql_fetch_array($result);
       // $popularity[$i]=$row[1];
       // $rank[$i]=$row[2];
        echo "<br />&nbsp".$year."&nbsp &nbsp &nbsp &nbsp".$row[1]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$row[2];
        
    }
    else
    {
        echo "<br /> &nbsp".$year."&nbsp &nbsp &nbsp &nbsp".'0'."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".'0';
        //$rank[$i]=0;
        //$popularity[$i]=0;
    }
    $i++;
    }
    
    echo "<br /><br /><h3 style='text-align: left; color: red;'> * (=) means two or more name in the same rank. </h3>";
    echo "<hr color=red /><br /><br />";
    
    
    
   // print_r($popularity);
    
    //echo "<br />".$row[0][1]." ".$row[0][1]." ";
}
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