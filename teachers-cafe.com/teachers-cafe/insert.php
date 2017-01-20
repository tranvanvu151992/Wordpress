<?php
/*
Template Name: wp insert data
*/
get_header();
?>

<form method="POST" action="http://www.teachers-cafe.com/author-insert/"> 
Ttile: <input type="text" NAME="customtitle" id="title"/> </br>
Comment: <input type="text" NAME="customcomment" id="comment"/></br>


<select name="customecountry" id="ecountry">
		    <option name="" value="">Select...</option>
                    <option name="country" value="USA">USA</option>
                    <option name="country" value="Canada">Canada</option>
</select>


Education Type: <input type="text" NAME="custometype" id="etype"/></br>
Disability Type: <input type="text" NAME="customdisability" id="disability"/></br> 
<input type="submit" NAME="submit"/> 
</form>

<?php 

if(isset($_POST['submit'])){
global $wpdb; 
$title = addslashes($_POST['customtitle']); 
$comment = addslashes($_POST['customcomment']);
$ecountry = addslashes($_POST['customecountry']);
$etype = addslashes($_POST['custometype']);
$disability = addslashes($_POST['customdisability']);
$table_name = "user2"; 

 $sql="insert into `$table_name`  (`title`,`comment`,`ecountry`,`etype`,`disability`) VALUES ('$title','$comment','$ecountry','$etype','$disability')";
	
        mysql_query($sql);


} 

?>






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
	ajax.open("POST", "http://www.teachers-cafe.com/wp-content/themes/teachers-cafe/file_upload_parser.php");
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
</head>
<body>
<h2>HTML5 File Upload Progress Bar Tutorial</h2>
<form id="upload_form" enctype="multipart/form-data" method="post">
  <input type="file" name="file1" id="file1"><br>
  <input type="button" value="Upload File" onclick="uploadFile()">
  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>
</body>
</html>
















<?php get_footer();?>