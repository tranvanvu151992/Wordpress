<?php
/*
Template Name: Author Upload
*/

/* other PHP code here */
?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package bloggr
 */

get_header(); ?>
	
<div class="grid grid-pad">

<aside id="sidebar" class="column-left">

<?php dynamic_sidebar( 'sidebar-home-left' ); ?>

	</aside>

	<div class="col-9-12">
	
	
        <div id="primary" class="content-area">
		
		
            <main id="main" class="site-main" role="main">
    
                <!DOCTYPE html>
<html>
<head>


<style>
/* Background Colors  */
progress,                          /* Firefox  */
progress[role][aria-valuenow] {    /* Polyfill */
   background: #fff !important; /* !important is needed by the polyfill */
}
 
/* Chrome */
progress::-webkit-progress-bar {
    background:#fcfcfc;
	border: 1px solid Silver   ;
	
}
 
/* Foreground Colors   */
/* IE10 */
progress {
    color:#00cc00;
}
 
/* Firefox */
progress::-moz-progress-bar { 
    background:#00cc00;   
}
 
/* Chrome */
progress::-webkit-progress-value {
    background:#00cc00;
}
 
/* Polyfill */
progress[aria-valuenow]:before  {
    background:#00cc00;
}
</style>
<script>

function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploading... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>















<style>
.main_top {
margin: auto;
width: 80%;
margin-top: 20px;
font-family: arial;
margin-right:0 auto;
margin-left:0 auto;

}

.col1 {
width: 20%;
float: left;
text-align:right;
}

.col2 {
width: 80%;
float: right;
text-align: right;
padding-right: 10px;margin-bottom:30px;
}



.button{
	float:right;
	width: 160px;
	height: 25px;
	background-color: #84c125;
	brder: 1px solid #84c125;
	border-radius: 10px;
margin-bottom:20px;
}
.button a:link {

    color: #fff;
	padding-top: 10px;
    text-align: right;
	padding-right: 15px;
    text-decoration: none;
    display: inline-block;

}


.button:hover {
    background-color:#2d5767;
}


#formfield1 {
width:100%;
margin-top: 80px;
font-family: arial;

}

</style>
</head>
<body>

<div class="main_top">

<h3 style="text-align: right; font-size: 22px;">Upload Author Files</h3>

<div class="col1">
<?php echo wp_eMember_get_user_details("profile_picture"); ?> 
</div>

<div class="col2">
<p style="font-size: 20px; ">Author: <?php echo wp_eMember_get_user_details("user_name"); ?></p>
<p style="font-size: 20px; padding-top: -30px; line-height: 0px; ">Membership Type: Basic</p>
<br />
<progress id="progressBar" max="100" value="5"></progress><span style="padding-left:10px; font-size: 20px;">Space for upload files</span></progress>
<p id="loaded_n_total" style="margin-top: -1px; font-size: 12px; padding-right: 215px;margin-right: 0px;"></p> <h3 id="status"></h3> 



<a style="color: #fff; padding-right: 10px; text-decoration: none; font-size: 14px; padding-top:2px;" class="button" href="#">Upgrade Package</a>
</div>

<p>
<input type="text" style="width: 100%; height: 30px; text-align: right; border:white; name="comment"/>
</p>



<form action="" method="POST" enctype="multipart/form-data">
 
<p style="text-align: right;font-size: 18px;">Lesson Title</br>
<input type="text" style="width: 100%; height: 30px; text-align: right;" NAME="customtitle" id="title" maxlength="70" value"70 characters "/>
</p>


<p style="text-align: right;font-size: 18px;">Abstrac of File</br>
<textarea style="width: 100%; height: 80px; text-align: right;" NAME="customcomment" id="comment"  maxlength="250" value"250 characters "> </textarea>
</p>

<p style="text-align: right; font-size: 18px;">Educational Country</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customecountry" id="ecountry">
 <option name="" value="">Select</option>
                    <option name="country" value="Saudi Arabia">Saudi Arabia</option>
                    <option name="country" value="United Arab Emirates">United Arab Emirates</option>
<option name="country" value="Kuwait">Kuwait</option>
<option name="country" value="Bahrain">Bahrain</option>
  </select>
</p>
<p style="text-align: right; font-size: 18px;">Educational type</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="custometype" id="etype">
    <option value="">Select</option>
	<option value="Normal Need ">Normal Need </option>
    <option value="Special Need">Special Need</option>
  </select>
  </p>
  
<p style="text-align: right;  font-size: 18px;">Disability Type</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customdisability" id="disability">
<option value="">Select</option>
<option value="Intellectual disability">Intellectual disability</option>
	<option value="Visual disable">Visual disable</option>
	<option value="Hearing disable">Hearing disable</option>
<option value="Physical disable">Physical disable</option>

</select>
</p>


<p style="text-align: right;  font-size: 18px;">Educational Content</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customeducationc" id="educationc">
<option value="">Select</option>
	<option value="Lessons preparations">Lessons preparations</option>
	<option value="Hearing disable">work sheets</option>
        <option value="Learning resources Idea">Learning resources Idea</option>
        <option value="Model lessons">Model lessons</option>
        <option value="Resources package">Resources package</option>
 <option value="Field training & professional development">Field training & professional development</option>
</select>
</p>

<p style="text-align: right;  font-size: 18px;">File Type</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customftype" id="ftype">
<option value="">Select</option>
	<option value="Sheet file ">Sheet file </option>
	<option value="PowerPoint">PowerPoint</option>

</select>
</p>

<p style="text-align: right;  font-size: 18px;">Price</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customprice" id="price">
<option value="">Select</option>
	<option value="$500">$500 </option>
	<option value="$1000">$1000</option>

</select>
</p>





<p style="text-align: right;  font-size: 18px;">Subject</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customsubject" id="subject">
<option value="">Select</option>
	<option value="Sheet file ">Subject1 </option>
	<option value="PowerPoint">Subject2</option>

</select>
</p>

<p style="text-align: right;  font-size: 18px;">Grade</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customgrade" id="grade">
<option value="">Select</option>
	<option value="Sheet file ">Grade1 </option>
	<option value="PowerPoint">Grade2</option>

</select>
</p>



<p style="text-align: right; margin-right:-70px;font-size: 18px;">
Please fill in the file-upload:
<input type="file" name="file1"  id="file1"/>
</p>






<div style=" margin-top:10px;">
<label>
    <input type="submit" NAME="submit" value="Submit" onclick="uploadFile()" class="button"style="text-align: right; color: #fff; text-decoration: none; font-size: 16px; padding-right:15px; border:none;background-color: #84c125;border-radius: 10px;padding-top:2px;padding-bottom:1px;" />
  </label>
  </div>
 </form>

<?php 

if(isset($_POST['submit'])){
global $wpdb; 
$title = addslashes($_POST['customtitle']); 
$comment = addslashes($_POST['customcomment']);
$ecountry = addslashes($_POST['customecountry']);
$etype = addslashes($_POST['custometype']);
$disability = addslashes($_POST['customdisability']);
$educationc = addslashes($_POST['customeducationc']);
$ftype = addslashes($_POST['customftype']);
$price = addslashes($_POST['customprice']);
$subject = addslashes($_POST['customsubject']);
$grade = addslashes($_POST['customgrade']);


$file = rand(1000,100000)."-".$_FILES['file1']['name'];
    $file_loc = $_FILES['file1']['tmp_name'];
	$file_size = $_FILES['file1']['size'];
	$ftype = $_FILES['file1']['ftype'];
	
	$folder="wp-content/themes/teachers-cafe/uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	$final_file=str_replace(' ','-',$new_file_name);

		
	if(move_uploaded_file($file_loc,$folder.$final_file))







$table_name = "author"; 

 $sql="insert into `$table_name`  (`title`,`comment`,`ecountry`,`etype`,`disability`,`educationc`,`ftype`,`price`,`subject`,`grade`,`file1`,`size`) VALUES ('$title','$comment','$ecountry','$etype','$disability','$educationc','$ftype','$price','$subject','$grade','$final_file','$new_size')";

mysql_query($sql);


} 
?>


</div> 
</body>
</html>
</main><!-- #main -->
</div><!-- #primary -->
</div>





<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>