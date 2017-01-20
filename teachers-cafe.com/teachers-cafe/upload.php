<?php session_start();
error_reporting(0);
if(isset($_POST['submit']))
{ 

$title = $_SESSION['title'];
$comment = $_SESSION['comment'];
$ecountry = $_SESSION["ecountry"];
$etype = $_SESSION["etype"];
$disability = $_SESSION['disability'];
$educationc = $_POST["educationc"];
$ftype = $_POST["ftype"];
$price = $_POST["price"];
$subject = $_POST["subject"];
$grade = $_POST["grade"];
//**********************SEND TO DATABASE****************************

 //MySQL Database Connect
 include 'db.php'; 
 
 
 
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$ftype = $_FILES['file']['ftype'];
	
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	$final_file=str_replace(' ','-',$new_file_name);

	
	
	
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

$query = "INSERT INTO author (title, comment,ecountry,etype,disability,educationc,ftype,price,subject,grade,file,size)" . "VALUES ('$title', '$comment','$ecountry','$etype','$disability','$educationc','$ftype','$price','$subject','$grade','$final_file','$new_size')";
//if($query){echo 'data has been placed'}
mysql_query($query) or die(mysql_error());

	}
}

?>