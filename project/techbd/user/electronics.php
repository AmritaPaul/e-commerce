
<?php



?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catagory</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Rubik" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="style5.css" type="text/css">

<link rel="icon" type="../image/png/jpg" href="../image/logo.jpg"/>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css" href="../user/style1.css">




<script type="text/javascript">
function validate() {

var B = document.getElementById("search");
if(B.value== "" || B.value== null) {
alert("Please enter a product name or id or brand or price ");
B.style.border = "2px solid red";
return false;
} else {
B.style.border = "";
}
}
function del() {
    
       var del= confirm("For sure Would you like to delete it?");
    if(del==true)
        { return true;}
    else 
        { return false;}
           }
</script>



</head>
<body>


<div id="container1">


<header>
		<?php
			include('head.php');
		?>
	</header>
	
    <div id="search-layer"></div>

<?php
			include('user_menu.php');
?>
<div id="display3">
<?php
include('../db/config.php');
$page=0;
$show=4;
if(isset($_POST["page"]))
{
 $page=$_POST["page"];
 $page=($page*$show)-$show;
}
$sql="SELECT * FROM oprodinfo WHERE op_category='electronic' ORDER BY op_id DESC limit $page,$show";
$res = mysqli_query($myconn,$sql);
?>
<?php echo' <table width="100%" border="1px" bgcolor="#0066FF" cellspacing="0" cellpadding="6">

<tr>
	<td width="20%" valign="top">Product Name</td>
 	<td width="20%" valign="top">Product Id </td>
	<td width="20%" valign="top">Product image</td>
 	<td width="20%" valign="top"> Product Price</td>
		<td width="20%" valign="top"> &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>

</table>

';?>


<?php
while($row=mysqli_fetch_array($res))
{
$id= $row['op_id'];
$name= $row['op_name'];
$picpath=$row['p_image'];
$price=$row['op_price'];
 ?>
    <?php echo' <table width="100%" border="1px" bgcolor="#CCCCFF" cellspacing="0" cellpadding="6">

<tr>
	<td width="20%" valign="top">'.$id.'</td>
 	<td width="20%" valign="top">'.$name.' </td>
	<td width="20%"> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<img src="../user/prodimg/'.$picpath.'" width="80px"height="80px"/></td>
	<td width="20%" valign="top"> &nbsp;&nbsp;&nbsp;'.$price.'TK </td>
	<td width="20%" valign="top"><a href="../user/details.php?id='.$id.'" ">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="image" src="../image/button_details.png" width="90px" height="30px" "></td></a>

</tr>


</table>

';?>
    <?php
}
$sql2="SELECT * FROM oprodinfo WHERE op_category='electronic' ORDER BY op_id DESC";
$res1 = mysqli_query($myconn,$sql2);
$count=mysqli_num_rows($res1);
$a=$count/$show;
$a=ceil($a);
echo "<br><br><br>";
?>
<form method="post">&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;
<?php
for($b=1;$b<=$a;$b++)
{
 ?>
    <input type="submit" value="<?php echo $b;?>" name="page">
    <?php
}?>

</div>
<div id="footer1">

<?php
			include('footer.php');
?>


</div>

</div>
</body>
</html>