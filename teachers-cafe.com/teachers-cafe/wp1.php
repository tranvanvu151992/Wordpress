<?php
/*
Template Name: Author Upload3
*/

/* other PHP code here */
?>


<html>
<head>
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
<form id="form" name="form" method="post" action="wp2.php">
<p style="text-align: right;font-size: 18px;">Title</br>
<input type="text" style="width: 95%; height: 30px; text-align: right;" name="title" id="title"/>
</p>


<p style="text-align: right;font-size: 18px;">Abstrac of File</br>
<textarea style="width: 95%; height: 80px; text-align: right;" name="comment" id="comment"> </textarea>
</p>

<p style="text-align: right; font-size: 18px;">Educational Country</br>
<select style="width: 95%; height: 30px; text-align: right;" name="ecountry" id="ecountry">
    <option value="">Select</option>
	<option value="usa">USA</option>
	<option value="uk">UK</option>
  </select>
</p>
<p style="text-align: right; font-size: 18px;">Educational type</br>
<select style="width: 95%; height: 30px; text-align: right;" name="etype" id="etype">
    <option value="">Select</option>
	<option value="Type1">E-Type1</option>
    <option value="Type2">E-Type2</option>
  </select>
  </p>
  
 <p style="text-align: right;  font-size: 18px;">Disability Type</br>
<select style="width: 95%; height: 30px; text-align: right;" name="disability" id="disability">
    <option value="">Select</option>
	<option value="Disability1">Disability Type1</option>
	<option value="Disability2">Disability Type2</option>
  </select>
</p>



 <div style=" margin-top:10px;">
<p>
  <label>
    <input type="submit" name="submit" id="Go to page 2"" value="Next" class="button"style="text-align: right; color: #fff; text-decoration: none; font-size: 16px; padding-right:10px; border:none;" />
  </label> 
  </div>
 </form>
</div> 
</body>
</html>
